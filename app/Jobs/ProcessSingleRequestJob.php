<?php

namespace App\Jobs;

use App\Models\RequestModel;
use App\Models\StatusUrl;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessSingleRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;

    public function __construct(RequestModel $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $now = now();

        if (!$this->request->url) {
            Log::warning("Request ID {$this->request->id} has no URL. Skipped.");
            return;
        }

        try {
            $response = Http::get($this->request->url);
            $this->request->update(['last_visited' => $now]);

            StatusUrl::create([
                'request_id'  => $this->request->id,
                'to_email'    => $this->request->email ?? null,
                'description' => 'Request sent successfully',
                'status'      => $response->successful() ? 1 : 0,
                'status_code' => $response->status(),
            ]);

            Log::info("Request sent to {$this->request->url} at {$now}. Response status: {$response->status()}");
        } catch (\Exception $e) {
            Log::error("Failed to send request to {$this->request->url}: " . $e->getMessage());
        }
    }
}
