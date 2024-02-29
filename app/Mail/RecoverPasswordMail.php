<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoverPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private string $randomToken
    ) {}

    public function build()
    {
        return $this->subject('Reset password')
        ->view('reset_password')
        ->with([
            'randomToken' => $this->randomToken,
        ]);
    }
}
