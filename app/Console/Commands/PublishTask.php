<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Activity;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\Publish;

class PublishTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Goal Report';

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
        $currentWeek = date('W');

        $tasks  = Activity::where('week',$currentWeek)->orderBy('business')->get();

        

       foreach($tasks as $task){
        $endpoint = 'https://script.google.com/macros/s/AKfycbzrTlpQbGA3nOOSmSTHWV4UQckNBMR_jcti8CXdPYy_2wlrPGj-y_zWyoYx8v-Ee20d_g/exec';


       

        // Convert to Carbon instance
        $carbonDate = Carbon::createFromFormat('Y-m-d', $task->due_date);
        
        // Format the date as "d - M"
        $formattedDate = $carbonDate->format('d-M');
        
      
        // Query parameters
        $params = [
            'sheet' => $currentWeek,
            'Business' => $task->business,
            'Arm' => $task->arm,
            'Task' => $task->task,
            'Output' => $task->output,
            'Obligated' => $task->obligated,
            'Due_Date' => $formattedDate,
            'Comment' => $task->comment,
            'Status' => $task->status
        ];
        
        // Make the GET request with query parameters
        $response = Http::get($endpoint, $params);
        
        // Get the response body as an array
        $result = $response->json();
       }

       //send email here
       $emails = ['oluwakorede.babatunde@laurenparkerway.com', 'edidiong.bobson@asknello.com'];

       Mail::to($emails)->send(new Publish());

        //end here

        Log::debug('Goal Report Published');
    }
}
