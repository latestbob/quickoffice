<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Meetingmail extends Mailable
{
    use Queueable, SerializesModels;
    public $meetingschedule;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($meetingschedule)
    {
        $this->meetingschedule=$meetingschedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('email.meeting');

        return $this->subject('QuickOffice New Meeting Schedule')
        ->markdown('email.meeting')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('meetingschedule',$this->meetingschedule);
     
    }
}
