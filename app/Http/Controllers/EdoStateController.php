<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mdainitiative;
use Illuminate\Support\Facades\Mail;
use App\Mail\LateMail;
use App\Change;
use App\Mail\MdaApproval;
use Carbon\Carbon;

class EdoStateController extends Controller
{
    //addinitiative

    // $table->string('objectives')->nullable();
    // $table->string('mda')->nullable();
    // $table->string('email')->nullable();
    // $table->string('initiative')->nullable();
    // $table->string('outcome')->nullable();
    // $table->string('date')->nullable();
    // $table->string('budget')->nullable();
    // $table->string('owner')->nullable();
    // $table->string('support')->nullable();
    // $table->string('stage')->nullable();
 public function addinitiative(Request $request){
    $mda = new Mdainitiative;
    $mda->objectives = $request->objectives;
    $mda->mda = $request->mda;
    $mda->email = $request->email;
    $mda->initiative = $request->initiative;
    $mda->outcome = $request->outcome;
    $mda->date = $request->date;
    $mda->budget = $request->budget;
    $mda->owner = $request->owner;
    $mda->support = $request->support;
    $mda->stage = $request->stage;
    $mda->status = "Not Started";

    $mda->save();

    return response()->json([
        'status' => 200,
        'message' => 'Initiative Created successfully'
    ]);

    

 }

//  get inititatives

public function getinitiative(){

    // $delete = Mdainitiative::truncate();
    $mda = Mdainitiative::all();

    return response()->json($mda);
}


//get unique

public function getunique(Request $request){
    
    // $mda = Mdainitiative::where('mda',$request->mda)->truncate();

    $mda = Mdainitiative::where('mda',$request->mda)->orderBy('date')->get()->toArray();

    return response()->json($mda);
}


//update initiative


public function updateinitiative(Request $request){
    $mda = Mdainitiative::where('id',$request->id)->update([
        'date' => $request->date,
        'budget' => $request->budget,
        'owner' => $request->owner,
        'support' => $request->support,
        'stage' => $request->stage,
        'status' => $request->status,
    ]);

    return response()->json([
        'status' => 200,
        'message' => 'Initiative Updated Successfully',
    ]);
}


// get mda summary

public function mdasummary(Request $request){
   
    $initiation = Mdainitiative::where('mda',$request->mda)->where('stage','Initiation')->count();
    $planning = Mdainitiative::where('mda',$request->mda)->where('stage','Planning')->count();
    $execution = Mdainitiative::where('mda',$request->mda)->where('stage','Execution')->count();
    $completed = Mdainitiative::where('mda',$request->mda)->where('stage','Done')->count();

    $total = Mdainitiative::where('mda',$request->mda)->count();

    $late = Mdainitiative::where('mda',$request->mda)->where('status','Late')->count();
    $notstarted = Mdainitiative::where('mda',$request->mda)->where('status','Not Started')->count();
    $ontime = Mdainitiative::where('mda',$request->mda)->where('status','On Time')->count();
    $complete = Mdainitiative::where('mda',$request->mda)->where('status','Completed')->count();
    //percentage

    $late_percent = ($late / $total) * 100;
    $notstarted_percent = ($notstarted / $total) * 100;
    $ontime_percent = ($ontime / $total) * 100;
    $exe_percent = ($execution / $total) * 100;
    $complete_percent = ($complete / $total) * 100;

    return response()->json([
        
        'initiation' => $initiation,
        'planning' => $planning,
        'execution' => $execution,
        'completed' => $completed,
        'total' => $total,

        'late_percent' => $late_percent,
        'notstarted_percent' => $notstarted_percent,
        'ontime_percent' => $ontime_percent,
       
        'complete_percent' => $complete_percent

    ]);
}


//completion rate


public function completionrate(){

    $total_edhic =  Mdainitiative::where('mda','Edo State Health Insurance Commission')->count();
    $edhic_status = Mdainitiative::where('mda','Edo State Health Insurance Commission')->where('status','Completed')->count();


    if($total_edhic != 0 && $edhic_status != 0){
        $edhic_completion_rate = ($edhic_status / $total_edhic) * 100;
    }

    else{
        $edhic_completion_rate = 0;
    }

    

    // hma

    $total_hma = Mdainitiative::where('mda','Edo State Hospitals Management Agency')->count();
    $hma_status = Mdainitiative::where('mda','Edo State Hospitals Management Agency')->where('status','Completed')->count();


    if($total_hma != 0 && $hma_status != 0){
        $hma_completion_rate = ($hma_status / $total_hma) * 100;
    }
    else{
        $hma_completion_rate = 0;
    }


    // EDSMoH

    $total_smoh = Mdainitiative::where('mda','State Ministry of Health')->count();
    $smoh_status = Mdainitiative::where('mda','State Ministry of Health')->where('status','Completed')->count();


    if($total_smoh != 0 && $smoh_status != 0){
        $smoh_completion_rate = ($smoh_status / $total_smoh) * 100;
    }
    else{
        $smoh_completion_rate = 0;
    }


     // PHC

     $total_phc = Mdainitiative::where('mda','Edo State Primary Health Care Development Agency')->count();
     $phc_status = Mdainitiative::where('mda','Edo State Primary Health Care Development Agency')->where('status','Completed')->count();
 
 
     if($total_phc != 0 && $phc_status != 0){
         $phc_completion_rate = ($phc_status / $total_phc) * 100;
     }
     else{
         $phc_completion_rate = 0;
     }
 


    

    return response()->json([
        'edihic_completion_rate' => round($edhic_completion_rate, 2),
        'hma_completion_rate' => round($hma_completion_rate, 2),
        'smoh_completion_rate' => round($smoh_completion_rate, 2),
        'phc_completion_rate' => round($phc_completion_rate, 2),

        'total_edihic' => $total_edhic,
        'total_hma' => $total_hma,
        'total_smoh' => $total_smoh,
        'total_phc' => $total_phc

    ]);
}


//send late email 

public function lateemail(Request $request){

    $late = [
        'owner' => $request->owner,
        'date' => $request->date,
        'initiative' => $request->initiative
    ];


    Mail::to('edidiongbobson@gmail.com')->send(new LateMail($late));

    return response()->json([
        'status' => "success",
        'message' => 'Message sent successfully'
    ]);


}


public function primarychange(Request $request){
    $mda = Mdainitiative::where('id',$request->id)->first();

   

    $mda_name = $mda->mda;
    $changer_email = $request->changer_email;
    $changer_name = $request->changer_name;
    $date = $request->date;
    $budget = $request->budget;
    $stage = $request->stage;
    $status = $request->status;

    $change = new Change;

    $change->mda = $mda_name;
    $change->changer_email = $changer_email;
    $change->changer_name = $changer_name;
    $change->initiative_id = $request->id;
    

    if($mda->date != $request->date){
        $change->date = $request->date;
    }

    if($mda->budget != $request->budget){
        $change->budget = $request->budget;
    }

    if($mda->stage != $request->stage){
        $change->stage = $request->stage;
    }

    if($mda->status != $request->status){
        $change->status = $request->status;
    }

    $change->save();

    $mdaupdate = Mdainitiative::where('id',$request->id)->update([
        'flagged' => 'pending',
    ]);

    //send changes notification to mda head

    $head = "";
    if($mda->mda == 'Edo State Health Insurance Commission'){
        $head = 'Dr. Amegor Rock';
    }

    else if($mda->mda == 'State Ministry of Health'){
        $head = 'Dr. Samuel Alli';
    }

    else if($mda->mda == 'Edo State Primary Health Care Development Agency'){
        $head = 'Dr. Omosigho Izedonmwen';
    }

    else if($mda->mda == 'Edo State Hospitals Management Agency'){
        $head = 'Dr. Efosa Aisien';
    }


    $mdacontent = [
        'head' => $head,
        'initiative' => $mda->initiative,
    ];

   // Mail::to($mda->email)->send(new MdaApproval($mdacontent));

   //uncomment the above later

     Mail::to('edidiongbobson@gmail.com')->send(new MdaApproval($mdacontent));


    return response()->json($change);

   
    

    

}

//get changes

public function getchanges(Request $request){
    $change = Change::where('initiative_id',$request->id)->orderBy('id', 'desc')->first();

    return response()->json($change);
}

//approve mda changes

public function approvechange(Request $request){
    $change = Change::where('initiative_id',$request->id)->orderBy('id', 'desc')->first();
    $mda = Mdainitiative::where('id',$request->id)->first();

    

    if($change->date !=null){
        $date = Mdainitiative::where('id',$request->id)->update([
            'date' => $change->date,
        ]);
    }

    if($change->budget !=null){
        $budget = Mdainitiative::where('id',$request->id)->update([
            'budget' => $change->budget,
        ]);
    }

    if($change->status !=null){
        $status = Mdainitiative::where('id',$request->id)->update([
            'status' => $change->status,
        ]);
    }

    if($change->stage !=null){
        $stage = Mdainitiative::where('id',$request->id)->update([
            'stage' => $change->stage,
        ]);
    }

    $clear = Mdainitiative::where('id',$request->id)->update([
        'flagged' => '',
    ]);

    $updatechange = Change::where('id',$change->id)->update([
        'isApproved' => true,
    ]);

    //send approve mail to mda head

    
    

    return response()->json('Changes approved');


}

//reject changes

public function rejectchanges(Request $request){

    $change = Change::where('initiative_id',$request->id)->orderBy('id', 'desc')->first();
    $clear = Mdainitiative::where('id',$request->id)->update([
        'flagged' => '',
    ]);


    $updatechange = Change::where('id',$change->id)->update([
        'isApproved' => false,
    ]);

    // send reject mail to mda primary user

    return response()->json('Changes rejected');


}


//check notify

public function checknotify(){
    $mda = Mdainitiative::whereDate(
        'date', // replace with your actual date column name
        '=',
        Carbon::today()->addWeek()->toDateString()
    )->get();


    return response()->json($mda);
}




}
