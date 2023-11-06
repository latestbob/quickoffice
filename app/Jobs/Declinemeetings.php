<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\Declinemeetingmail;

class Declinemeetings implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $declinedmeetingss;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($declinedmeetingss)
    {
        $this->declinedmeetingss=$declinedmeetingss;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new Declinemeetingmail($this->declinedmeetingss);
        Mail::to($this->declinedmeetingss['creatormail'])->send($email);
    }
}
