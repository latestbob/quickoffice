<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\Taskforstaffmail;

class Taskforstaff implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $taskforstaff;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($taskforstaff)
    {
        $this->taskforstaff=$taskforstaff;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new Taskforstaffmail($this->taskforstaff);
        Mail::to($this->taskforstaff['receiver'])->send($email);
    }
}
