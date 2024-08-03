<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendmda extends Mailable
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
        return $this->subject(' Your Login Details for the 2024 Health Monitoring Tool ')
        ->view('email.sendmdamail')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('mdanotify',$this->mdanotify);
    }
}
