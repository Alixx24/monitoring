<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
 Schedule::command('requests:process')->everyMinute();

Schedule::command('requests:process-15-min')->everyFifteenMinutes();

Schedule::command('app:process-requests-five-minute')->everyFiveMinutes();