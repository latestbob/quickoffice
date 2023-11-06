<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Taskforstaffmail extends Mailable
{
    use Queueable, SerializesModels;
    public $taskforstaff;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($taskforstaff)
    {
        $this->taskforstaff=$taskforstaff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        

        return $this->subject('QuickOffice, New Task,')
        ->markdown('email.taskforstaff')
        ->from('info@quickoffice.com', 'New Task')
        ->with('taskforstaff',$this->taskforstaff);
     
    }
}
