<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskReview extends Mailable
{
    use Queueable, SerializesModels;
    public $receiver;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver)
    {
        //
        $this->receiver = $receiver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Recent Review Update on your Task')
        ->view('email.taskreview')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('receiver',$this->receiver);
    }
}
