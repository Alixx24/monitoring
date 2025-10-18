<?php

namespace App\Console\Commands;

use App\Models\RequestModel;
use Illuminate\Console\Command;
use App\Jobs\ProcessSingleRequestJob;
use Illuminate\Support\Facades\Cache;

class ProcessRequestsFiveMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-requests-five-minute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process requests every 5 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('ProcessRequestsFiveMinute command is running');

        $requests = Cache::remember('requests_status_1_duration_5_min', 300, function () {
            return RequestModel::where('status', 1)
                ->where('duration_id', 2)
                ->get();
        });

        $this->info("Found " . $requests->count() . " requests to process");

        foreach ($requests as $request) {
            ProcessSingleRequestJob::dispatch($request);
            $this->info("Dispatched job for request ID: {$request->id}");
        }

        $this->info('ProcessRequestsFiveMinute command completed successfully');
    }
}