<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailCode extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationCode;

    /**
     * Create a new message instance.
     *
     * @param int $verificationCode
     */
    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email Verification Code')->view('emails.email_verification_code');
    }
}
