<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalReminder extends Mailable
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
        return $this->subject('Re:Expense Approval Request')
        ->view('email.approvalreminder')
        ->from('office@laurenparkerway.com', 'QuickOffice')
        ->with('expense',$this->expense);
    }
}
