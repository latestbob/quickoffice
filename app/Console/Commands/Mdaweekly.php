<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mdaweekmail;
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
        )->where('status','!=','Completed')->get();


        if ($mda->count() > 0) {

        foreach($mda as $m){

            $head = "";
    if($m->mda == 'Edo State Health Insurance Commission'){
        $head = 'Dr. Amegor Rock';
    }

    else if($m->mda == 'State Ministry of Health'){
        $head = 'Dr. Samuel Alli';
    }

    else if($m->mda == 'Edo State Primary Health Care Development Agency'){
        $head = 'Dr. Omosigho Izedonmwen';
    }

    else if($m->mda == 'Edo State Hospitals Management Agency'){
        $head = 'Dr. Efosa Aisien';
    }



            $mdanotify = [
                'initiative' => $m->initiative,
                'name' => $head,
                
            ];
          

           // Mail::to($m->email)->send(new Mdaweekmail($mdanotify));

           Mail::to($m->email)->send(new Mdaweekmail($mdanotify));
        }

    }
    
  

    }
}
