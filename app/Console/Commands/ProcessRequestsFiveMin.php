<?php

namespace App\Console\Commands;

use App\Models\RequestModel;
use App\Models\StatusUrl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendUrlStatusEmailJob;
use App\Jobs\ProcessSingleRequestJob;
class ProcessRequestsFiveMin extends Command
{
    protected $signature = 'requests:process-5-min';

    protected $description = 'Send HTTP requests based on user requests and their 5 durations';


public function handle()
{
    $this->info('ProcessRequestsFiveMin command is running');

    $requests = RequestModel::where('status', 1)
        ->where('duration_id', 4)
        ->get();

    foreach ($requests as $request) {
        ProcessSingleRequestJob::dispatch($request);
        $this->info("Dispatched job for request ID: {$request->id}");
    }
}
}
