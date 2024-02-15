<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mondays;
use Illuminate\Support\Facades\Log;

class Monday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monday:motivation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Staff Monday Motivation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('office','LaurenParker')->pluck('email');


       // Mail::to($emails)->send(new Mondays());


        // foreach ($users as $email) {
        //     Mail::to($email)->send(new Mondays());
        // }


        $emails = ['edidiongbobson@gmail.com'];

        Mail::to($emails)->send(new Mondays());
  

        Log::debug('Monday Motivation delivered');
    }
}
