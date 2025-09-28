<?php

namespace App\Console\Commands;

use App\Models\RequestModel;
use App\Models\StatusUrl; 
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendUrlStatusEmailJob;

class ProcessRequestsFiveMin extends Command
{
    protected $signature = 'requests:process-5-min';

    protected $description = 'Send HTTP requests based on user requests and their 5 durations';

    public function handle()
    {
            $this->info('ProcessRequestsFiveMin command is running');

        $now = now();
 $requests = RequestModel::where('status', 1)
            ->where('duration_id', 4)
            ->get();
        foreach ($requests as $request) {
            if (!$request->url) {
                $this->warn("Request ID {$request->id} has no URL. Skipped.");
                continue;
            }

            try {
                $response = Http::get($request->url);
                $request->update(['last_visited' => $now]);

                // ثبت وضعیت در جدول (در صورت نیاز)
                StatusUrl::create([
                    'request_id'  => $request->id,
                    'to_email'    => $request->email ?? null,
                    'description' => 'Request sent successfully',
                    'status'      => $response->successful() ? 1 : 0,
                    'status_code' => $response->status(),
                ]);

                // ارسال ایمیل فقط وقتی وضعیت غیر از 200 هست
                if (!empty($request->email) && $response->status() !== 200) {
                    SendUrlStatusEmailJob::dispatch(
                        $request->email,
                        $request->url,
                        $response->status()
                    );
                    $this->info("Dispatched email job to {$request->email} (Status: {$response->status()})");
                }

                $this->info("Request processed for URL {$request->url}. Status code: {$response->status()}");
                Log::info("Request sent to {$request->url} at {$now}. Response status: {$response->status()} for {$request->duration} minute(s).");

            } catch (\Exception $e) {
                Log::error("Failed to send request to {$request->url}: " . $e->getMessage());
                $this->error("Failed to send request to {$request->url}: " . $e->getMessage());

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
    }
}
