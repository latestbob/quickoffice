<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Declinemeetingmail extends Mailable
{
    use Queueable, SerializesModels;
    public  $declinedmeetingss;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($declinedmeetingss)
    {
        $this->declinedmeetingss=$declinedmeetingss;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('email.declinemeeting');

        return $this->subject('QuickOffice Meeting Declined')
        ->markdown('email.declinemeeting')
        ->from($this->declinedmeetingss['participantmail'], 'QuickOffice')
        ->with('declinedmeetingss',$this->declinedmeetingss);
        
    }
}
