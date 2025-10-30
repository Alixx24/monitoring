<?php

namespace App\Http\Controllers;

use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Illuminate\Http\Request;
use App\Models\Payment as PaymentModel;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    
    public function pay(Request $request)
    {
       
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['error' => 'لطفاً وارد حساب کاربری خود شوید.']);
        }

       
        $order = Order::find(1);

     
        if (!$order) {
            return redirect()->route('home')->withErrors(['error' => 'سفارشی با این شناسه پیدا نشد.']);
        }

        $amount = 2000; 
        $amountInRial = $amount * 1;

      
        $invoice = (new \Shetabit\Multipay\Invoice)->amount($amountInRial);

        try {
        
            $payment = Payment::via('zarinpal')->purchase($invoice, function ($driver, $transactionId) use ($order, $amountInRial) {
               
                PaymentModel::create([
                    'order_id' => $order->id,
                    'user_id' => auth()->user()->id ?? null,
                    'transaction_id' => $transactionId,
                    'amount' => $amountInRial,
                    'currency' => 'R',  
                    'status' => 'pending',  
                ]);

              
                session(['payment' => [
                    'user_id' => auth()->user()->id ?? null,
                    'amount' => $amountInRial,
                    'order_id' => $order->id,
                ]]);
            });

         
            return $payment->pay()->render();
        } catch (\Exception $e) {
            Log::error('Payment Gateway Error:', ['error' => $e->getMessage()]);
            return redirect()->route('payment.failed')->withErrors(['payment' => $e->getMessage()]);
        }
    }

 
    public function callback(Request $request)
    {
        DB::beginTransaction();

        try {
            $authority = $request->get('Authority');
            $status = $request->get('Status');

            if (!$authority) {
                throw new \Exception('پارامتر Authority یافت نشد.');
            }

         
            $payment = PaymentModel::where('transaction_id', $authority)->first();

            if (!$payment) {
                throw new \Exception('تراکنش در پایگاه داده یافت نشد.');
            }

            if ($status !== 'OK') {
                $payment->update(['status' => 'failed']);
                return redirect()->route('payment.failed')->withErrors(['payment' => 'پرداخت توسط کاربر لغو شد.']);
            }

            $amount = $payment->amount;
            $receipt = Payment::via('zarinpal')->transactionId($authority)->amount($amount)->verify();

       
            $payment->update([
                'status' => 'paid',
                'ref_id' => $receipt->getReferenceId(),
                'raw_response' => json_encode($receipt),
            ]);

            DB::commit();

            return redirect()->route('payment.success')->with('payment', $payment);

        } catch (InvalidPaymentException $e) {
            DB::rollBack();
            if (isset($payment)) {
                $payment->update(['status' => 'failed']);
            }
            return redirect()->route('payment.failed')->withErrors(['payment' => $e->getMessage()]);
        } catch (\Exception $e) {
            DB::rollBack();
            if (isset($payment)) {
                $payment->update(['status' => 'failed']);
            }
            return redirect()->route('payment.failed')->withErrors(['payment' => $e->getMessage()]);
        }
    }


    public function success()
    {
        $payment = session('payment');
                $userId =  auth()->user()->id;

       if (!$payment) {
        return redirect()->route('payment.failed')->withErrors(['payment' => 'اطلاعات پرداخت در دسترس نیست.']);
    }

      
          return redirect()->route('dashboard.index', ['id' => $userId]);
    }


    public function failed(Request $request)
    {
        $errors = session('errors');
        return view('payment.failed', compact('errors'));
    }
}
