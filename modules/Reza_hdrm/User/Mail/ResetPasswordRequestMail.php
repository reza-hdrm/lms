<?php

namespace Reza_hdrm\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    /**
     * Create a new message instance.
     *
     * @param $code
     */
    public function __construct(int $code) {
        $this->code=$code;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build() {
        return $this->markdown('User::mails.reset-password-verify-code')->subject('وب آموز | بازیابی رمز عبور ');
    }
}
