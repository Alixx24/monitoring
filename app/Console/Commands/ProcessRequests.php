<?php

namespace App\Console\Commands;

use App\Models\RequestModel;
use App\Models\StatusUrl;
use App\Jobs\SendUrlStatusEmailJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessRequests extends Command
{
    protected $signature = 'requests:process';

    protected $description = 'Send HTTP requests based on user requests and their durations';

    public function handle()
    {
        $requests = RequestModel::where('status', 1)
            ->where('duration_id', 1)
            ->get();

        foreach ($requests as $request) {
            $this->info("Processing Request ID: {$request->id}, URL: {$request->url}, Email: " . ($request->email ?? 'null'));

            if (!$request->url) {
                $this->warn("Request ID {$request->id} has no URL. Skipped.");
                continue;
            }

            try {
                // ارسال درخواست HTTP
                $response = Http::get($request->url);

                // ذخیره تاریخ بازدید
                $request->last_visited = now();
                $request->save();

                // ثبت وضعیت در جدول
                StatusUrl::create([
                    'request_id'   => $request->id,
                    'to_email'     => $request->email ?? null,
                    'description'  => 'Request successful',
                    'status'       => $response->successful() ? 1 : 0,
                    'status_code'  => $response->status(),
                ]);

                $this->info("StatusUrl created for Request ID {$request->id}");

                // اگر status code غیر از 200 بود، ارسال ایمیل
                if ($response->status() !== 200 && !empty($request->email)) {
                    SendUrlStatusEmailJob::dispatch(
                        $request->email,
                        $request->url,
                        $response->status()
                    );
                    $this->info("Dispatched email job to {$request->email} (Status: {$response->status()})");
                }

                $this->info("Request processed. Status code: {$response->status()}");

            } catch (\Exception $e) {
                // لاگ خطای درخواست
                $this->error("Request failed for URL {$request->url}: " . $e->getMessage());
                Log::error("HTTP request failed for Request ID {$request->id}: " . $e->getMessage());

                // ثبت وضعیت شکست‌خورده
                try {
                    StatusUrl::create([
                        'request_id'   => $request->id,
                        'to_email'     => $request->email ?? null,
                        'description'  => 'Request failed: ' . $e->getMessage(),
                        'status'       => 0,
                        'status_code'  => null,
                    ]);
                    $this->info("Failed StatusUrl created for Request ID {$request->id}");
                } catch (\Exception $ex) {
                    $this->error("Failed to save failed StatusUrl: " . $ex->getMessage());
                    Log::error("DB error on StatusUrl creation: " . $ex->getMessage());
                }

                // ارسال ایمیل در صورت خطا
                if (!empty($request->email)) {
                    SendUrlStatusEmailJob::dispatch(
                        $request->email,
                        $request->url,
                        'خطا در اتصال'
                    );
                    $this->info("Dispatched failure email job to {$request->email}");
                }
            }
        }

        $this->info('All requests processed.');
        Log::info('All requests processed.');
    }
}
