<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $give_interest, $setting;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($give_interest, $setting)
    {
        $this->give_interest = $give_interest;
        $this->setting = $setting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.interest')->with([
            'giveInterest' => $this->give_interest,
            'setting' => $this->setting,
        ]);
    }
}
