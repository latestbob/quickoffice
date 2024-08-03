<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mdatwodaymail extends Mailable
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
        return $this->subject('Reminder: Initiative Completion Due in 2 Days - Action Required')
        ->view('email.mdatwodaymail')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('mdanotify',$this->mdanotify);
    }
}
