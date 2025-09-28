<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UrlStatusNotification extends Mailable
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
    return $this->subject('وضعیت نامناسب لینک')
                ->view('emails.url_status_notification')
                ->with([
                    'url' => $this->url,
                    'statusCode' => $this->statusCode,
                ]);
}

}
