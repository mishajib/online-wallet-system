<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferBonusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $referUser;
    public $user;
    public $refer_bonus;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($referUser, $user, $refer_bonus)
    {
        $this->referUser = $referUser;
        $this->user = $user;
        $this->refer_bonus = $refer_bonus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.refer_bonus')->with([
            'referUser' => $this->referUser,
            'user' => $this->user,
            'refer_bonus' => $this->refer_bonus,
        ]);
    }
}
