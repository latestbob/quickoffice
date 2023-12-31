<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Subscriptionmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber)
    {
        $this->subscriber=$subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('email.subscription');

         /////
         return $this->subject('Thanks for subscribing to QuickOffice')
         ->markdown('email.subscription')
         ->from('info@quickoffice.online', 'Quick Office')
         ->with('subscriber',$this->subscriber);
         
    }
}
