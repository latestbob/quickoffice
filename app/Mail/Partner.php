<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Partner extends Mailable
{
    use Queueable, SerializesModels;
    public $staffs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($staffs)
    {
        //

        $this->staffs = $staffs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Weekly Task Summary - Week '.date('W'))
        ->view('email.partners')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('staffs',$this->staffs);
    }
}
