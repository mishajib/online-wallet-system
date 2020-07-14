<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignUpBonusMail extends Mailable
{
    use Queueable, SerializesModels;
    public $setting;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($setting)
    {
        $this->setting = $setting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.signup_bonus')->with([
            'setting' => $this->setting,
        ]);
    }
}
