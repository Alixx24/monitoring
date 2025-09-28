<?php

namespace App\Jobs;

use App\Mail\UrlStatusNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendUrlStatusEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $url;
    protected $status;

    public function __construct($email, $url, $status)
    {
        $this->email = $email;
        $this->url = $url;
        $this->status = $status;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new UrlStatusNotification($this->url, $this->status));
    }
}
