<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MdaApproval extends Mailable
{
    use Queueable, SerializesModels;
    public $mdacontent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mdacontent)
    {
        //
        $this->mdacontent = $mdacontent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(' Request for Your Attention: Initiative Update')
        ->view('email.mdaapproval')
        ->from('office@mdamonitor.com', 'Quick Office')
        ->with('mdacontent',$this->mdacontent);
    }
}
