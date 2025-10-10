<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;  
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UrlStatusNotification extends Mailable implements ShouldQueue  
{
   use Queueable, SerializesModels;

    public $url;
    public $statusCode;

    public function __construct($url, $statusCode)
    {
        $this->url = $url;
        $this->statusCode = $statusCode;
    }

  public function build()
  {
      return $this->subject('Notification of Link Issue')
                  ->view('emails.url_status_notification')
                  ->with([
                      'url' => $this->url,
                      'statusCode' => $this->statusCode,
                  ]);
  }
}
