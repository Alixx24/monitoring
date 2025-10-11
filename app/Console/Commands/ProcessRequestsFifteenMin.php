<?php

namespace App\Console\Commands;

use App\Models\RequestModel;
use Illuminate\Console\Command;
use App\Jobs\ProcessSingleRequestJob;
use Illuminate\Support\Facades\Cache;

class ProcessRequestsFifteenMin extends Command  
{
    protected $signature = 'requests:process-15-min';  
    protected $description = 'Send HTTP requests based on user requests and their 15 minutes duration';  

    public function handle()
    {
        $this->info('ProcessRequestsFifteenMin command is running');   

        $requests = Cache::remember('requests_status_1_duration_3', 900, function () {
            return RequestModel::where('status', 1)
                ->where('duration_id', 3) 
                ->get();
        });

        foreach ($requests as $request) {
            ProcessSingleRequestJob::dispatch($request);
            $this->info("Dispatched job for request ID: {$request->id}");
        }
    }
}