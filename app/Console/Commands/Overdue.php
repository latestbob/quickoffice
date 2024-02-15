<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Activity;
use App\User;
use Carbon\Carbon;

class Overdue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'overdue:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Overdue task command';

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
        

        $tasks = Activity::where('status','pending')->get();
        $today = Carbon::today();

        // Format the date as "Y-m-d"
        $formattedDate = $today->format('Y-m-d');



        foreach($tasks as $task){

            $dateB = Carbon::createFromFormat('Y-m-d', $task->due_date);

            if ($today->gt($dateB)) {
                $task->update(['status' => 'overdue']);

            } 

        }
        
         
        
    }
}
