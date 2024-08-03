<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mdalatemail extends Mailable
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
        return $this->subject('Action Required:Late Initiative')
        ->view('email.mdalateemail')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('mdanotify',$this->mdanotify);
    }
}
