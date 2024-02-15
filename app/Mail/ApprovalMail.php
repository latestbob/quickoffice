<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $expense;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($expense)
    {
        //
        $this->expense = $expense;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Expense Approval Request')
        ->view('email.approval')
        ->from('office@laurenparkerway.com', 'QuickOffice')
        ->with('expense',$this->expense);
    }
}
