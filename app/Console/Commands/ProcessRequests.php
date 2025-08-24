<?php

namespace App\Console\Commands;

use App\Models\RequestModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessRequests extends Command
{
    protected $signature = 'requests:process';

    protected $description = 'Send HTTP requests based on user requests and their durations';
public function handle()
{
    $now = now();

    $requests = RequestModel::where('status', 'active')->get();

    foreach ($requests as $request) {
        if (!$request->last_visited || $now->diffInMinutes($request->last_visited) >= $request->duration) {
            try {
                $response = Http::get($request->url);
                $request->last_visited = $now;
                $request->save();

                $message = "Request sent to {$request->url} at {$now}. Response status: {$response->status()} for {$request->duration} minute(s).";
                Log::info($message);
                $this->info($message);
            } catch (\Exception $e) {
                Log::error("Failed to send request to {$request->url}: " . $e->getMessage());
                $this->error("Failed to send request to {$request->url}: " . $e->getMessage());
            }
        }
    }

    $this->info('All requests processed.');
    Log::info('All requests processed.');
}

}
