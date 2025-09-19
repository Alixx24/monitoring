<?php

namespace App\Console\Commands;

use App\Models\RequestModel;
use App\Models\StatusUrl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessRequests extends Command
{
    protected $signature = 'requests:process';

    protected $description = 'Send HTTP requests based on user requests and their durations';

    public function handle()
    {
   

        $requests = RequestModel::where('status', 1)->where('duration_id', 1)->get();

        foreach ($requests as $request) {

            $this->info("Processing Request ID: {$request->id}, URL: {$request->url}, To Email: " . ($request->to_email ?? 'null'));

            if (!$request->url) {
                $this->warn("Request ID {$request->id} has no URL, skipped.");
                continue;
            }

            try {
                $response = Http::get($request->url);
                $now = now();
                $request->last_visited = $now;
                $request->save();
                try {
                    StatusUrl::create([
                        'request_id' => $request->id,
                        'to_email' => $request->email ?? null,
                        'description' => 'Request successful',
                        'status' => $response->successful() ? 1 : 0,
                        'status_code' => $response->status(),
                    ]);

                    $this->info("StatusUrl record created for Request ID {$request->id}");
                } catch (\Exception $e) {
                    $this->error("Failed to create StatusUrl for Request ID {$request->id}: " . $e->getMessage());
                    Log::error("Failed to create StatusUrl for Request ID {$request->id}: " . $e->getMessage());
                }

                $this->info("Request to {$request->url} processed. Status code: {$response->status()}");
            } catch (\Exception $e) {
                try {
                    StatusUrl::create([
                        'request_id' => $request->id,
                        'to_email' => $request->to_email ?? null,
                        'description' => 'Request failed: ' . $e->getMessage(),
                        'status' => 0,
                        'status_code' => null,
                    ]);
                    $this->info("StatusUrl failure record created for Request ID {$request->id}");
                } catch (\Exception $ex) {
                    $this->error("Failed to create failure StatusUrl for Request ID {$request->id}: " . $ex->getMessage());
                    Log::error("Failed to create failure StatusUrl for Request ID {$request->id}: " . $ex->getMessage());
                }

                $this->error("Failed to send request to {$request->url}: " . $e->getMessage());
                Log::error("Failed to send request to {$request->url}: " . $e->getMessage());
            }
        }

        $this->info('All requests processed.');
        Log::info('All requests processed.');
    }
}
