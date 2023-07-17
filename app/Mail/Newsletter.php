<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $toEmail;
    public $subject;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $toEmail, string $subject, string $text)
    {
        $this->toEmail = $toEmail;
        $this->subject = $subject;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newsletter')->subject($this->subject);
    }
}
