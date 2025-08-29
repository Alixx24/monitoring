<?php

namespace App\Console\Commands;

use App\Models\RequestModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessRequestsFiveMin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-requests-five-min';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send HTTP requests based on user requests and their 5 durations';

    /**
     * Execute the console command.
     */


    public function handle()
    {
        $now = now();
        $requests = RequestModel::where('status', 'active')->where('duration', 5)->get();

        foreach ($requests as $request) {


            try {
                foreach ($requests as $request) {
                    if ($request->url) {
                        $response = Http::get($request->url);
                        $now = now();
                        $request->update(['last_visited' => $now]);
                    }
                }

                $message = "Request sent to {$request->url} at {$now}. Response status: {$response->status()} for {$request->duration} minute(s).";
                Log::info($message);
                $this->info($message);
            } catch (\Exception $e) {
                Log::error("Failed to send request to {$request->url}: " . $e->getMessage());
                $this->error("Failed to send request to {$request->url}: " . $e->getMessage());
            }
        }
    }
}
