<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrimaryNotify extends Mailable
{
    use Queueable, SerializesModels;
     public $mdaprimary;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mdaprimary)
    {
        //

        $this->mdaprimary = $mdaprimary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Initiative Update Status')
        ->view('email.mdaprimary')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('mdaprimary',$this->mdaprimary);
    }
}
