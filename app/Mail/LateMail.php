<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LateMail extends Mailable
{
    use Queueable, SerializesModels;
    public $late;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($late)
    {
        //
        $this->late = $late;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Urgent: Initiative Delay – Action Required')
        ->view('email.late')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('late',$this->late);
    }
}
