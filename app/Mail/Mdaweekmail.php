<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mdaweekmail extends Mailable
{
    use Queueable, SerializesModels;
    public $mdanotify;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mdanotify)
    {
        //

        $this->mdanotify = $mdanotify;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reminder: Initiative Completion Due in 1 Week - Action Required')
        ->view('email.mdaweekmail')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('mdanotify',$this->mdanotify);
    }
}
