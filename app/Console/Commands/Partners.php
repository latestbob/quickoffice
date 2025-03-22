<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\Partner;
use App\User;
use Illuminate\Support\Facades\Mail;

class Partners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'partner:summary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'partner summary';

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
        $emails = ['uzor@laurenparkerway.com','zainab@laurenparkerway.com'];

        // $emails = ['edidiongbobson@gmail.com'];

        $staffs = User::where('office','LaurenParker')->where('position','!=','Admin')->get();
    
          Mail::to($emails)->send(new Partner($staffs));
    
    
        //   return response()->json('Email sent');
    }
}
