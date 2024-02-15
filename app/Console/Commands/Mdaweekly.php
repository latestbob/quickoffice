<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mondays;
use App\Mdainitiative;
//use Illuminate\Support\Facades\Log;

class Mdaweekly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mda:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mda weekly';

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
        $emails = ['edidiongbobson@gmail.com'];

        


        $mda = Mdainitiative::whereDate(
            'date', // replace with your actual date column name
            '=',
            Carbon::today()->addWeek()->toDateString()
        )->get();

        foreach($mda as $m){
            Mail::to($emails)->send(new Mondays());
        }
    
  

    }
}
