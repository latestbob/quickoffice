<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Task;
use App\Meeting;
use App\Invoice;
use Auth;
use App\User;
use App\Plan;
use App\Events;
use Hash;
use App\Office;
use App\Expense;
use App\Branch;
use Carbon\Carbon;
use App\Receivedpay;
use App\Notifications\MeetingNotification;
use App\Notifications\SendTask;
use App\Notifications\DeclinedMeetingNotification;
use App\Jobs\Subscription;
use App\Jobs\Taskforstaff;
use App\Jobs\Meetings;
use App\Jobs\Declinemeetings;
class pagesController extends Controller
{
    //index page   https://paystack.com/pay/az04o6ayd7
    public function index(){

       

        $office=Office::where('plan','!=','lifeplan')->get();

      //  $freesub=Office::where('type','free')->get();

     
      $current = Carbon::now()->format('Y-m-d H:i:s'); //get the current day date("Y-m-d H:i:s")
     
      $minudays=Carbon::parse($current)->subDays(14)->format('Y-m-d'); //minus 14days from the current day

      $currentdate=Carbon::parse($current);


//get office where created_at is lesser than  current day - 14 days and update the active to be false

        $freeexpired=Office::where('type','free')->where('created_at','<',$minudays)->update([
            'active'=>'false'
        ]);

   //checking for expired subscribed office,, these are office where paid (which is the next payment date)
   // is lesser than today
        $subscribedexpiredoffice=Office::where('plan','Starter')
        ->orwhere('plan','Basic')
        ->orwhere('plan','Professional')
        ->orwhere('plan','Business')
        ->orwhere('plan','Enterprise')->get();

       
        foreach($subscribedexpiredoffice as $sub){
          if($sub->paid < $currentdate){
             $expiredoffice=Office::where('id',$sub->id)->update([

                'active'=>'false'
             ]);


          }
        }
      


        
       
      
   
        
        return view('realindex');
   
    }

    //te
    

    public function test(){
        return view('test');
    }

// this is the footer plan
    //report submit for all authenticated staff

    public function reports(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'date'=>'required',
            'office'=>'required',
            'reporter'=>'required'
        ]);

        $report=new Report;
        $report->title=$request->title;
        $report->content=$request->content;
        $report->date=$request->date;
        $report->office=$request->office;
        $report->reporter=$request->reporter;
        $report->save();

        return back()->with('msg','Reported Registered Successfully');
        
    }

    // task submit post for all authenticated users except client

    public function posttasks(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'start'=>'required',
            'end'=>'required',
            'category'=>'required',
            'supervisor'=>'required',
            'description'=>'required',
            'fileattachment'=>'max:2000',
        ]);
        
     
        $now_datetime = date("Y-m-d H:i:s", strtotime('+1 hours'));
       
        //check if today is greater than start date or today is greater than end date
//this is the header plan
        $date1 = $request->end; 
        $date2 = $request->start; 
        
          
        // Use strtotime() function to convert 
        // date into dateTimestamp 
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
    


        

        //check if tasks is for staff///////


      
        /////////

        

       if($request->staff){

            if($request->hasfile('fileattachment')){  //if file is selected
                $attachment=$request->file('fileattachment');
                
                $myattachment=$attachment->getClientOriginalName();
                
                $finalname=Auth::user()->office.'-'.$myattachment;
    
                $attachment->move('taskattachment',$finalname);

                $task=new Task;
                $task->title=$request->title;
                $task->start=$request->start;
                $task->end=$request->end;
                $task->category=$request->category;
                $task->client=$request->client;
                $task->supervisor=$request->supervisor;
                $task->description=$request->description;
                $task->office=Auth::user()->office;
                $task->createdby=$request->staff; //created by will be the staff you wanted to create task for ,,, instead of you
                $task->status='pending';
                $task->attachment=$finalname;
    
                $task->save();
    
                /////SEND NOTIFICATION TO THE STAFF TASK WAS CREATED FOR //////////
    
                $task=[
                    'data'=>'New Task was created for you by',
                    'createdby'=>Auth::user()->name,
                    
                  
                    'title'=>$request->title,
                   
                    
                ];

              


    
                
    
    
            $id=User::where('name',$request->staff)->value('id');
                $email=User::where('name',$request->staff)->value('email');
                
               User::find($id)->notify(new SendTask($task));
               $supervisoremail=User::where('office',Auth::user()->office)->where('name',$request->supervisor)->value('email');


               //send email to receiver 

               $taskforstaff=[
                    'office'=>Auth::user()->office,
                    'title'=>$request->title,
                    'created'=>$request->start,
                    'shouldend'=>$request->end,
                    'supervised'=>Auth::user()->name,
                    'description'=>$request->description,
                    'receiver'=>$email,
                    'supervisoremail'=>$supervisoremail
               ];

               dispatch(new Taskforstaff($taskforstaff));
    
                return back()->with('msg','You Have Created a Task for '.$request->staff);
    
              
    
            } //end of if in first else if 

            else{

                $task=new Task;
                $task->title=$request->title;
                $task->start=$request->start;
                $task->end=$request->end;
                $task->category=$request->category;
                $task->client=$request->client;
                $task->supervisor=$request->supervisor;
                $task->description=$request->description;
                $task->office=Auth::user()->office;
                $task->createdby=$request->staff; //created by will be the staff you wanted to create task for ,,, instead of you
                $task->status='pending';
                //$task->attachment=$finalname;
    
                $task->save();
    
                /////SEND NOTIFICATION TO THE STAFF TASK WAS CREATED FOR //////////
    
                $task=[
                    'data'=>'New Task was created for you by',
                    'createdby'=>Auth::user()->name,
                    
                  
                    'title'=>$request->title,
                   
                    
                ];
    
                
    
    
            $id=User::where('name',$request->staff)->value('id');
            $email=User::where('name',$request->staff)->value('email');
                
               User::find($id)->notify(new SendTask($task));

               
               $taskforstaff=[
                'office'=>Auth::user()->office,
                'title'=>$request->title,
                'created'=>$request->start,
                'shouldend'=>$request->end,
                'supervised'=>Auth::user()->name,
                'description'=>$request->description,
                'receiver'=>$email
           ];

           dispatch(new Taskforstaff($taskforstaff));
    
                return back()->with('msg','You Have Created a Task for '.$request->staff);
            }
         
         
          
        } //endof first if
        

        

        else{ /// if no staff
            if($request->hasfile('fileattachment')){
                $attachment=$request->file('fileattachment');
                
                $myattachment=$attachment->getClientOriginalName();
                
                $finalname=Auth::user()->office.'-'.$myattachment;
    
                $attachment->move('taskattachment',$finalname);
                
                $task=new Task;
                $task->title=$request->title;
                $task->start=$request->start;
                $task->end=$request->end;
                $task->category=$request->category;
                $task->client=$request->client;
                $task->supervisor=$request->supervisor;
                $task->description=$request->description;
                $task->office=Auth::user()->office;
                $task->createdby=Auth::user()->name;
                $task->status='pending';
                $task->attachment=$finalname;
                  
    
                $task->save();
    
                return back()->with('msg','Task was created successfully');

    
              
    
            } //end of if in else not stafff
         
            else{
                $task=new Task;
                $task->title=$request->title;
                $task->start=$request->start;
                $task->end=$request->end;
                $task->category=$request->category;
                $task->client=$request->client;
                $task->supervisor=$request->supervisor;
                $task->description=$request->description;
                $task->office=Auth::user()->office;
                $task->createdby=Auth::user()->name;
                $task->status='pending';
                //$task->attachment=$finalname;
                  
    
                $task->save();
    
                return back()->with('msg','Task was created successfully');
            }
           
        } //end of else if not staff

    }

    //create meeting schedule

    public function createmeetingschedule(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'start'=>'required',
           
            'participant'=>'required',
            'description'=>'required',
        ]);

        $now_datetime = date("Y-m-d H:i:s", strtotime('+1 hours'));
        $counted=Meeting::where('office',Auth::user()->office)->where('creator',Auth::user()->name)->count();
       

        if($now_datetime > $request->start){
            
            return back()->with("error","You can't choose a past date");
        }

        elseif($counted==5){
            return back()->with('error','You can only have 5 meetings created, Kindly Delete the pasted onces');
        }
        
        else{
            
            $meeting=new Meeting;
            $meeting->title=$request->title;
            $meeting->start=$request->start;
            $meeting->end=$request->end;
            $meeting->participant=$request->participant;
            $meeting->description=$request->description;
            $meeting->creator=Auth::user()->name;
            $meeting->office=Auth::user()->office;

            $meeting->save();

            $meetings=[
                'data'=>'A meeting was scheduled with you',
                'createdby'=>Auth::user()->name,
                
              
                'title'=>$request->title,
                'start'=>$request->start,
                'end'=>$request->end
                
            ];

            


        $id=User::where('name',$request->participant)->value('id');

            
           User::find($id)->notify(new MeetingNotification($meetings));

           $participantmail=User::where('office',Auth::user()->office)->where('name',$request->participant)->value('email');
           //send meeting schedule mail to participants

           $meetingschedule=[
               'office'=>Auth::user()->office,
               'createdby'=>Auth::user()->name,
               'creatormail'=>Auth::user()->email,
               'participantmail'=>$participantmail,
               'title'=>$request->title,
               'start'=>$request->start,
               'end'=>$request->end,
               'description'=>$request->description
           ];
           dispatch(new Meetings($meetingschedule));


            return back()->with('msgg','Meeting was created successfully');
        }
    }

    //get meeting

    public function getmeeting($id){
        $meeting=Meeting::find($id);

        return response()->json($meeting);
    }


    //decline schedule  

    public function declinemeeting($id){
        
       $meeting=Meeting::where('id',$id)->where('office',Auth::user()->office)->where('participant',Auth::user()->name)->update([
            'accept'=>'declined',
       ]);
       
       $todeclinemeeting=Meeting::where('id',$id)->where('office',Auth::user()->office)->where('participant',Auth::user()->name)->value('creator');
        
       $decline=[
           'participant'=>Auth::user()->name,
       ];
       
       $user=User::where('name',$todeclinemeeting)->where('office',Auth::user()->office)->firstOrFail();

       $user->notify(new DeclinedMeetingNotification($decline));

       //send email to creator that meeting has been declined
       $title=Meeting::where('id',$id)->where('office',Auth::user()->office)->where('participant',Auth::user()->name)->value('title');
       $start=Meeting::where('id',$id)->where('office',Auth::user()->office)->where('participant',Auth::user()->name)->value('start');
       $creator=Meeting::where('id',$id)->where('office',Auth::user()->office)->where('participant',Auth::user()->name)->value('creator');

       $creatormail=User::where('office',Auth::user()->office)->where('name',$creator)->value('email');
       $declinedmeetingss=[
            'title'=>$title,
            'start'=>$start,
            'office'=>Auth::user()->office,
            'participant'=>Auth::user()->name,
            'participantmail'=>Auth::user()->email,
            'creatormail'=>$creatormail
       ];

       dispatch(new Declinemeetings($declinedmeetingss));
       return back()->with('msg','You have declined a meeting');
     
     
    }

    //delete meeting 

    public function deletemeeting($id){
        $meeting=Meeting::where('id',$id)->where('office',Auth::user()->office)->where('creator',Auth::user()->name)->delete();
        return back()->with('msgg','Meeting deleted successfully');

        
    }


    //show invoice 
    public function showinvoice($id){
        $invoice=Invoice::find($id);

        return view('invoice',compact('invoice'));
    }

    //get an office

    public function getoffice(){
        return view('getoffice');
    }


    //get office to form

    public function getofficeregister($plan){
        
        return view('toform',compact('plan'));
    }

    //submit the form

    public function registerofficepost(Request $request){


        $this->validate($request,[
            'office_name'=>'required',
            'office_email'=>'required|email',
            'office_phone'=>'required',
            'alternate_phone'=>'required',
            'office_address'=>'required',
            'admin_email'=>'required|email',
            'admin_name'=>'required',
           'admin_password'=>'required',
            

            

        ]);

        $office=new Office;
        $office->office_name=$request->office_name;
        $office->official_mail=$request->office_email;
        $office->password=Hash::make($request->office_phone);
        $office->official_phone=$request->office_phone;
        $office->slug=strtolower($request->office_name);
        $office->office_address=$request->office_address;
        $office->secured_answer=$request->admin_name;
        $office->save();

        $branch=new Branch;
        $branch->name='headquarters';
        $branch->office=$request->office_name;
        $branch->location=$request->office_address;
        $branch->save();

        $admin=new User;
        $admin->name=$request->admin_name;
        $admin->email=$request->admin_email;
        $admin->password=Hash::make($request->admin_password);
        $admin->office=$request->office_name;
        $admin->phone=$request->office_phone;
        $admin->branch='headquarters';
        $admin->position='admin';
        $admin->description='Admin';
        $admin->dob=date('Y-m-d');
        $admin->save();

        $event=new Events ;
            $event->title='Welcome';
            $event->start=date('Y-m-d');
            $event->end=date('Y-m-d');
            $event->office=$request->office_name;
            $event->description='Successfully Registration';
            $event->createdby=$request->admin_name;
            $event->save();


        return back()->with('msg','Thanks for registering your office');

        
    }

    //paystack route 

    public function paystackroute(Request $request){

        $curl = curl_init();
//$reference = isset($_GET['reference']) ? $_GET['reference'] : '';

$reference=$request->reference;
if(!$reference){
    // header("Location: https://incomeopportunitymarketplace.com/my-account");
  //die('No reference supplied');

  return redirect('/');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_47e6f6e14cc2dfef084dd91f5bb612c88073cd12", //PUT YOUR OWN KEY
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){
  //do what every you desire with the output

  //dd($tranx->data->metadata->office);


  //adding the office details ////////

  $existedoffice=Office::where('office_name',$tranx->data->metadata->office_name)->where('official_mail',$tranx->data->metadata->official_mail)->exists();

  if($existedoffice){ //check if office already exist..if exist just update the plan, plan_code,customer,code,plan,paid, etc
   
   
        $office=Office::where('office_name',$tranx->data->metadata->office_name)->where('official_mail',$tranx->data->metadata->official_mail)->update([
            'reference'=>$tranx->data->reference,
            'amount'=>$tranx->data->amount,
            'paid'=>$tranx->data->metadata->paid,
            'channel'=>$tranx->data->channel,
            'customer_code'=>$tranx->data->customer->customer_code,
            'plan_code'=>$tranx->data->metadata->plancode,
            'plan'=>$tranx->data->metadata->plan, 
            'active'=>"true",
            'type'=>'subscribed'




        ]);

        ////////////////////////////SEND EMAIL INVOICE TO OFFICE OFFICIAL MAIL

       // return redirect('/get/office')->with('msg','Thanks for subscribing, Start Enjoying');

       $officeurl='http://localhost:8000/'.$tranx->data->metadata->office_name;


    return view('success',compact('officeurl'));
        

  }
  else{ //if the office does not exists do this
    
    $office=new Office;
    $office->office_name=$tranx->data->metadata->office;
    $office->official_mail=$tranx->data->metadata->official_mail;
    $office->password=$tranx->data->metadata->password;
    $office->official_phone=$tranx->data->metadata->official_phone;
    $office->slug=strtolower($tranx->data->metadata->office);
    $office->office_address=$tranx->data->metadata->office_address;
    $office->secured_answer=$tranx->data->metadata->admin_name;
    $office->status=$tranx->data->status;
    $office->reference=$tranx->data->reference;
    $office->amount=$tranx->data->amount;
    $office->paid=$tranx->data->metadata->nextpaid;   /////////////////////////////next date of payment here ////////////////////////////////////
    $office->channel=$tranx->data->channel;
    $office->email=$tranx->data->metadata->official_mail;
    $office->customer_code=$tranx->data->customer->customer_code;
    $office->plan_code=$tranx->data->plan;
    $office->plan=$tranx->data->metadata->plan;
    $office->active="true";
    $office->logo=$tranx->metadata->logo;
    $office->logo=$tranx->metadata->type;
    $office->save();



    ///////////branch details //////////////////
    $branch=new Branch;
    $branch->name='headquarters';
    $branch->office=$tranx->data->metadata->branch_office;
    $branch->location=$tranx->data->metadata->branch_location;
    $branch->save();

    /////////////////admin details/////////////////////
//'admin_realpassword'=>$request->admin_password,
    $admin=new User;
    $admin->name=$tranx->data->metadata->admin_name;
    $admin->email=$tranx->data->metadata->admin_email;
    $admin->password=$tranx->data->metadata->admin_password;
    $admin->office=$tranx->data->metadata->admin_office;
    $admin->phone=$tranx->data->metadata->admin_phone;
    $admin->branch='headquarters';
    $admin->position='admin';
    $admin->description='Admin';
    $admin->dob=date('Y-m-d');
    $admin->save();


    ////////////events ////  

    $event=new Events ;
    $event->title='Welcome';
    $event->start=date('Y-m-d');
    $event->end=date('Y-m-d');
    $event->office=$tranx->data->metadata->event_office;
    $event->description='Successfully Registration';
    $event->createdby=$tranx->data->metadata->event_createdby;
    $event->save();



    ///send mail to newly registered office after successful payments

    $current = date('Y-m-d');
    $dt = Carbon::parse($current);
   
     $endoffreeplan=$dt->addYear()->format('Y-m-d');

    $subscriber=[
        'officemail'=>$tranx->data->metadata->official_mail,
        'officename'=>$tranx->data->metadata->office,
        'officeurl'=>'https://quickoffice.online/'.$tranx->data->metadata->office.'/login',
        'officeplan'=>$tranx->data->metadata->plan,
        'enddate'=>$tranx->data->metadata->nextpaid,
        'adminemail'=>$tranx->data->metadata->admin_email,
        'adminpassword'=>$tranx->data->metadata->admin_realpassword,

    ];

    dispatch(new Subscription($subscriber));
    
    $officeurl='http://localhost:8000/'.$tranx->data->metadata->office;


    return view('success',compact('officeurl'));

  }

   

}

///////////////////////////////////////////////////////////////////////
        
        //return view('paystack');

        
    }

    //paystack post

    public function paystackpost(Request $request){
        $this->validate($request,[
            'office'=>'required',
            'email'=>'required|email',
            'plan_code'=>'required'
        ]);

    

    }


    //webhook 

    public function pay(Request $request){
        $input = @file_get_contents("php://input");
        $event = json_decode($input);
        // Do something with $event
        http_response_code(200); // PHP 5.4 or greater
    }

    //my api test

    public function myapi(){
        return 'working';
    }


    //myreal

    public function myreal(){
        return 'working';
    }



    //test paystack form route

    public function testpaystack(){
        return view('testpaystack');
    }


    //test paystack post

    public function testpaystackpost(Request $request){
        /*
       $this->validate($request,[
            'office'=>'required',
            'email'=>'required',
            'admin'=>'required'
       ]);
       */

      $this->validate($request,[
        'office_name'=>'required',
        'office_email'=>'required|email',
        'office_phone'=>'required',
        //'alternate_phone'=>'required',
        'office_address'=>'required',
        'admin_email'=>'required|email',
        'admin_name'=>'required',
       'admin_password'=>'required',
       'logo'=>'required|max:2048',
        

        

    ]);
       
       
    

    ////////////////////////////////////////////////////check if office email exists office mail exist

    $existed=Office::where('office_name',$request->office_name)->orWhere('official_mail',$request->office_email)->exists();

    if($existed){
        return back()->with('error','Office Email or Name already Exists');
    }

        if($request->plan=="starter"){

            $date=date('Y-m-d');

           
           
            $addfdf=Carbon::parse($date);
 
            $addyear=$addfdf->addYear()->format('Y-m-d');

            //$logo=$request->file('logo');
            $images=$request->file('logo');
            //dd($images);
                
            //$mylogo=$logo->getClientOriginalName();
            $imagename=$images->getClientOriginalName();
            
            $finallogoimage=$request->office_name.'-'.$imagename;

            $images->move('logo',$finallogoimage);

           


            $plan=Plan::where('plans','Starter')->firstOrFail();

                ////////////////////////
                
            //dd($addmonth);
        //start from paystack code if



        //////////new pay stack /////////////

        $url = "https://api.paystack.co/transaction/initialize";
  $fields = [
    
    'email' => $request->office_email,
    'amount' => $plan->amount,

    'metadata'=>[
        //meta datas here //////////////////////////
        
        'office'=>$request->office_name,
        'plan'=>$request->plan,
        'nextpaid'=>$addyear,
        'logo'=>$finallogoimage,
        'type'=>'subscribed',
 
       
       'office_name'=>$request->office_name,
        'official_mail'=>$request->office_email,
       'password'=>Hash::make($request->office_phone),
        'official_phone'=>$request->office_phone,
        'slug'=>strtolower($request->office_name),
        'office_address'=>$request->office_address,
        'secured_answer'=>$request->admin_name,
    
 
      
        'branch_name'=>'headquarters',
        'branch_office'=>$request->office_name,
        'branch_location'=>$request->office_address,
        
 
    
 
        'admin_name'=>$request->admin_name,
        'admin_email'=>$request->admin_email,
        'admin_password'=>Hash::make($request->admin_password),
        'admin_realpassword'=>$request->admin_password,
        'admin_office'=>$request->office_name,
        'admin_phone'=>$request->office_phone,
        'admin_branch'=>'headquarters',
        'admin_position'=>'admin',
        'admin_description'=>'Admin',
        'admin_dob'=>date('Y-m-d'),
       
 
        
            'event_title'=>'Welcome',
            'event_start'=>date('Y-m-d'),
            'event_end'=>date('Y-m-d'),
            'event_office'=>$request->office_name,
            'event_description'=>'Successfully Registration',
            'event_createdby'=>$request->admin_name,
           
 
        ///////end of meta datas ///////////////////////
         
      ],
         
  ];
  $fields_string = http_build_query($fields);
  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_47e6f6e14cc2dfef084dd91f5bb612c88073cd12",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  //echo $result;

  $initialize_data=json_decode($result);
    $initialization_url=$initialize_data->data->authorization_url;
  
    if($result){
        return redirect($initialization_url);
    }


        ///////end new paystack////////////
    


        }//when play is starter

        elseif($request->plan=="basic"){
            $date=date('Y-m-d');

           
           
            $addfdf=Carbon::parse($date);
 
            $addyear=$addfdf->addYear()->format('Y-m-d');
            //dd($addmonth);
               //start from paystack code if

            //$logo=$request->file('logo');
            $images1=$request->file('logo');
            //dd($images);
                
            //$mylogo=$logo->getClientOriginalName();
            $imagename1=$images1->getClientOriginalName();
            
            $finallogoimage1=$request->office_name.'-'.$imagename1;

            $images1->move('logo',$finallogoimage1);
            //dd($images1);

            $plan=Plan::where('plans','Basic')->firstOrFail();

    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
      
        'email' => $request->office_email,
        'amount' => $plan->amount,
      
     'metadata'=>[
       //meta datas here //////////////////////////

       'office'=>$request->office_name,
       'plan'=>$request->plan,
       'nextpaid'=>$addyear,
       'logo'=>$finallogoimage1,
       'type'=>'subscribed',

      
      'office_name'=>$request->office_name,
       'official_mail'=>$request->office_email,
      'password'=>Hash::make($request->office_phone),
       'official_phone'=>$request->office_phone,
       'slug'=>strtolower($request->office_name),
       'office_address'=>$request->office_address,
       'secured_answer'=>$request->admin_name,
   

     
       'branch_name'=>'headquarters',
       'branch_office'=>$request->office_name,
       'branch_location'=>$request->office_address,
       

   

       'admin_name'=>$request->admin_name,
       'admin_email'=>$request->admin_email,
       'admin_password'=>Hash::make($request->admin_password),
       'admin_realpassword'=>$request->admin_password,
       'admin_office'=>$request->office_name,
       'admin_phone'=>$request->office_phone,
       'admin_branch'=>'headquarters',
       'admin_position'=>'admin',
       'admin_description'=>'Admin',
       'admin_dob'=>date('Y-m-d'),
      

       
           'event_title'=>'Welcome',
           'event_start'=>date('Y-m-d'),
           'event_end'=>date('Y-m-d'),
           'event_office'=>$request->office_name,
           'event_description'=>'Successfully Registration',
           'event_createdby'=>$request->admin_name,
          

       ///////end of meta datas ///////////////////////
        
     ],
        
    ];

    


      

    $fields_string = http_build_query($fields);
    //open connection
    $ch = curl_init();
    
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer sk_test_47e6f6e14cc2dfef084dd91f5bb612c88073cd12",
      "Cache-Control: no-cache",
    ));
  
    //testing the plans
    
    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    
    //execute post
    $result = curl_exec($ch);
   
    $initialize_data=json_decode($result);
    $initialization_url=$initialize_data->data->authorization_url;
  
    if($result){
        return redirect($initialization_url);
    }
  
        }//when plan is basic
    

        elseif($request->plan=="professional"){
            
            $date=date('Y-m-d');

           
           
            $addfdf=Carbon::parse($date);
 
            $addyear=$addfdf->addYear()->format('Y-m-d');
           // dd($addyear);


               //$logo=$request->file('logo');
               $images2=$request->file('logo');
               //dd($images);
                   
               //$mylogo=$logo->getClientOriginalName();
               $imagename2=$images2->getClientOriginalName();
               
               $finallogoimage2=$request->office_name.'-'.$imagename2;
   
               $images2->move('logo',$finallogoimage2);
               //dd($images2);
       
            $plan=Plan::where('plans','Professional')->firstOrFail();
                         //start from paystack code if
    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
        
        'email' => $request->office_email,
        'amount' => $plan->amount,
    
     'metadata'=>[
       //// meta datas here 

       'office'=>$request->office_name,
       'plan'=>$request->plan,
       'nextpaid'=>$addyear,
       'logo'=>$finallogoimage2,
       'type'=>'subscribed',

      
      'office_name'=>$request->office_name,
       'official_mail'=>$request->office_email,
      'password'=>Hash::make($request->office_phone),
       'official_phone'=>$request->office_phone,
       'slug'=>strtolower($request->office_name),
       'office_address'=>$request->office_address,
       'secured_answer'=>$request->admin_name,
   

     
       'branch_name'=>'headquarters',
       'branch_office'=>$request->office_name,
       'branch_location'=>$request->office_address,
       

   
       'admin_name'=>$request->admin_name,
       'admin_email'=>$request->admin_email,
       'admin_password'=>Hash::make($request->admin_password),
       'admin_realpassword'=>$request->admin_password,
       'admin_office'=>$request->office_name,
       'admin_phone'=>$request->office_phone,
       'admin_branch'=>'headquarters',
       'admin_position'=>'admin',
       'admin_description'=>'Admin',
       'admin_dob'=>date('Y-m-d'),
      

       
           'event_title'=>'Welcome',
           'event_start'=>date('Y-m-d'),
           'event_end'=>date('Y-m-d'),
           'event_office'=>$request->office_name,
           'event_description'=>'Successfully Registration',
           'event_createdby'=>$request->admin_name,
          


       ///end of meta datas////
     ],
        
    ];

    


      

    $fields_string = http_build_query($fields);
    //open connection
    $ch = curl_init();
    
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer sk_test_47e6f6e14cc2dfef084dd91f5bb612c88073cd12",
      "Cache-Control: no-cache",
    ));
  
    //testing the plans
    
    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    
    //execute post
    $result = curl_exec($ch);
   
    $initialize_data=json_decode($result);
    $initialization_url=$initialize_data->data->authorization_url;
  
    if($result){
        return redirect($initialization_url);
    }
        }//end of when plan is pro



        elseif($request->plan=="business"){


            $date=date('Y-m-d');

           
           
            $addfdf=Carbon::parse($date);
 
            $addyear=$addfdf->addYear()->format('Y-m-d');
                                   //start from paystack code if

                                   $images3=$request->file('logo');
                                   //dd($images);
                                       
                                   //$mylogo=$logo->getClientOriginalName();
                                   $imagename3=$images3->getClientOriginalName();
                                   
                                   $finallogoimage3=$request->office_name.'-'.$imagename3;
                       
                                   $images3->move('logo',$finallogoimage3);
                                   //dd($images2);
                           
                                   $plan=Plan::where('plans','Business')->firstOrFail();
                   
    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
        'email' => $request->office_email,
        'amount' => $plan->amount,
    
     'metadata'=>[
        //meta data here  ////

        'office'=>$request->office_name,
        'plan'=>$request->plan,
        'nextpaid'=>$addyear,
        'logo'=>$finallogoimage3,
        'type'=>'subscribed',

       
       'office_name'=>$request->office_name,
        'official_mail'=>$request->office_email,
       'password'=>Hash::make($request->office_phone),
        'official_phone'=>$request->office_phone,
        'slug'=>strtolower($request->office_name),
        'office_address'=>$request->office_address,
        'secured_answer'=>$request->admin_name,
    

      
        'branch_name'=>'headquarters',
        'branch_office'=>$request->office_name,
        'branch_location'=>$request->office_address,
        

    
        'admin_name'=>$request->admin_name,
        'admin_email'=>$request->admin_email,
        'admin_password'=>Hash::make($request->admin_password),
        'admin_realpassword'=>$request->admin_password,
        'admin_office'=>$request->office_name,
        'admin_phone'=>$request->office_phone,
        'admin_branch'=>'headquarters',
        'admin_position'=>'admin',
        'admin_description'=>'Admin',
        'admin_dob'=>date('Y-m-d'),
       

        
            'event_title'=>'Welcome',
            'event_start'=>date('Y-m-d'),
            'event_end'=>date('Y-m-d'),
            'event_office'=>$request->office_name,
            'event_description'=>'Successfully Registration',
            'event_createdby'=>$request->admin_name,
           

        //end of meta datas
        
     ],
        
    ];

    


      

    $fields_string = http_build_query($fields);
    //open connection
    $ch = curl_init();
    
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer sk_test_47e6f6e14cc2dfef084dd91f5bb612c88073cd12",
      "Cache-Control: no-cache",
    ));
  
    //testing the plans
    
    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    
    //execute post
    $result = curl_exec($ch);
   
    $initialize_data=json_decode($result);
    $initialization_url=$initialize_data->data->authorization_url;
  
    if($result){
        return redirect($initialization_url);
    }
            
        } //endof when plan is business

        elseif($request->plan=="enterprise"){

            $date=date('Y-m-d');

           
           
            $addfdf=Carbon::parse($date);
 
            $addyear=$addfdf->addYear()->format('Y-m-d');
                                   //start from paystack code if

                                   $images3=$request->file('logo');
                                   //dd($images);
                                       
                                   //$mylogo=$logo->getClientOriginalName();
                                   $imagename3=$images3->getClientOriginalName();
                                   
                                   $finallogoimage3=$request->office_name.'-'.$imagename3;
                       
                                   $images3->move('logo',$finallogoimage3);
                                   //dd($images2);
                        
                                   $plan=Plan::where('plans','Enterprise')->firstOrFail();
                   
    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
      
        'email' => $request->office_email,
        'amount' => $plan->amount,
     'metadata'=>[
        //meta data here  ////

        'office'=>$request->office_name,
        'plan'=>$request->plan,
        'nextpaid'=>$addyear,
        'logo'=>$finallogoimage3,
        'type'=>'subscribed',

       
       'office_name'=>$request->office_name,
        'official_mail'=>$request->office_email,
       'password'=>Hash::make($request->office_phone),
        'official_phone'=>$request->office_phone,
        'slug'=>strtolower($request->office_name),
        'office_address'=>$request->office_address,
        'secured_answer'=>$request->admin_name,
    

      
        'branch_name'=>'headquarters',
        'branch_office'=>$request->office_name,
        'branch_location'=>$request->office_address,
        

    
        'admin_name'=>$request->admin_name,
        'admin_email'=>$request->admin_email,
        'admin_password'=>Hash::make($request->admin_password),
        'admin_realpassword'=>$request->admin_password,
        'admin_office'=>$request->office_name,
        'admin_phone'=>$request->office_phone,
        'admin_branch'=>'headquarters',
        'admin_position'=>'admin',
        'admin_description'=>'Admin',
        'admin_dob'=>date('Y-m-d'),
       

        
            'event_title'=>'Welcome',
            'event_start'=>date('Y-m-d'),
            'event_end'=>date('Y-m-d'),
            'event_office'=>$request->office_name,
            'event_description'=>'Successfully Registration',
            'event_createdby'=>$request->admin_name,
           

        //end of meta datas
        
     ],
        
    ];

    


      

    $fields_string = http_build_query($fields);
    //open connection
    $ch = curl_init();
    
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer sk_test_47e6f6e14cc2dfef084dd91f5bb612c88073cd12",
      "Cache-Control: no-cache",
    ));
  
    //testing the plans
    
    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    
    //execute post
    $result = curl_exec($ch);
   
    $initialize_data=json_decode($result);
    $initialization_url=$initialize_data->data->authorization_url;
  
    if($result){
        return redirect($initialization_url);
    }

        } //end of when plan is enterprise

        elseif($request->plan=="starterfree"||$request->plan=="basicfree"||$request->plan=="professionalfree"||$request->plan=="businessfree"||$request->plan=="enterprisefree"){

       

            //$logo=$request->file('logo');
            $images=$request->file('logo');
            //dd($images);
                
            //$mylogo=$logo->getClientOriginalName();
            $imagename=$images->getClientOriginalName();
            
            $finallogoimage=$request->office_name.'-'.$imagename;

            $images->move('logo',$finallogoimage);


      
           ///////////put all the data to database//////////


           $office=new Office;
           $office->office_name=$request->office_name;
           $office->official_mail=$request->office_email;
           $office->password=Hash::make($request->office_phone);
           $office->official_phone=$request->office_phone;
           $office->slug=strtolower($request->office_name);
           $office->office_address=$request->office_address;
           $office->secured_answer=$request->admin_name;
           $office->status="success";
           //$office->reference=$tranx->data->reference;
           //$office->amount=$tranx->data->amount;
           //$office->paid=($tranx->data->paid_at)->format('Y-m-d H:i:s');;
           //$office->channel=$tranx->data->channel;
           $office->email=$request->office_email;
           //$office->customer_code=$initialize_data->data->customer_code;
           //$office->plan_code=$tranx->data->plan;
           $office->plan=$request->plan;
           $office->active="true";
           $office->type="free";
           $office->logo=$finallogoimage;
           $office->save();
   
   
   
           ///////////branch details //////////////////
           $branch=new Branch;
           $branch->name='headquarters';
           $branch->office=$request->office_name;
           $branch->location=$request->office_address;
           $branch->save();
   
           /////////////////admin details/////////////////////
   
           $admin=new User;
           $admin->name=$request->admin_name;
           $admin->email=$request->admin_email;
           $admin->password=Hash::make($request->admin_password);
           $admin->office=$request->office_name;
           $admin->phone=$request->office_phone;
           $admin->branch='headquarters';
           $admin->position='admin';
           $admin->description='Admin';
           $admin->dob=date('Y-m-d');
           $admin->save();
   
   
           ////////////events ////  
   
           $event=new Events ;
           $event->title='Welcome';
           $event->start=date('Y-m-d');
           $event->end=date('Y-m-d');
           $event->office=$request->office_name;;
           $event->description='Successfully Registration';
           $event->createdby=$request->admin_name;
           $event->save();
   


           ///Send Email freeplanemail

           $current = date('Y-m-d');
           $dt = Carbon::parse($current);
          
            $endoffreeplan=$dt->addDays(10)->format('Y-m-d');

           $subscriber=[
               'officemail'=>$request->office_email,
               'officename'=>$request->office_name,
               'officeurl'=>'https://quickoffice.online/'.$request->office_name.'/login',
               'officeplan'=>$request->plan,
               'enddate'=>$endoffreeplan,
               'adminemail'=>$request->admin_email,
               'adminpassword'=>$request->admin_password,

           ];

           dispatch(new Subscription($subscriber));  //send email to free subscribers

           $officeurl='http://localhost:8000/'.$request->office_name.'/login';
           
   
        

           return view('success',compact('officeurl'));



        }//end of when plan is free

    }


    //office renewal post

  



    ///resubscription  section

    public function officeresubscriptionsection(Request $request){
        $this->validate($request,[
           
           
            
            'email'=>'required',
           
            

            
        ]);

        

        $existed=Office::where('official_mail',$request->email)->exists();

        if(!$existed){
            return back()->with('error','Invalid Email Address');
        }
       
       //////

      


    }  //end of the resubscription


  

    public function officechooseplanafterfreeexpired(Request $request){
       
        $this->validate($request,[
            
           
            
            'email'=>'required|email',
            'office_name'=>'required'
            
        ]);

        $amount=Plan::where('plans',$request->plan)->value('amount');
        
        if($request->email != $request->official_mail){
            return back()->with('error','Invalid Email Address');
        }
      
    
        

      
      
    
          else{
           
                        $current = date('Y-m-d');
                        $dt = Carbon::parse($current);
                        
                        $endofplan=$dt->addYear()->format('Y-m-d');

                         $url = "https://api.paystack.co/transaction/initialize";
                            $fields = [
                                'email' => $request->email,
                                'amount' => $amount,
                                
                                
                                'metadata'=>[
                            
                    
                                //meta data here //
                                
                                'plan'=>$request->plan,
                               
                                'paid'=>$endofplan,
                                'office_name'=>$request->office_name,
                                'official_mail'=>$request->email,
                                    
                        
                                //end of meta data ////
                                
                                ],
                            ];
                            $fields_string = http_build_query($fields);
                            //open connection
                            $ch = curl_init();
    
           
                            //set the url, number of POST vars, POST data
                            curl_setopt($ch,CURLOPT_URL, $url);
                            curl_setopt($ch,CURLOPT_POST, true);
                            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                "Authorization: Bearer sk_test_47e6f6e14cc2dfef084dd91f5bb612c88073cd12",
                                "Cache-Control: no-cache",
                            ));
                            
                            //So that curl_exec returns the contents of the cURL; rather than echoing it
                            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                            
                            //execute post
                            $result = curl_exec($ch);
                            echo $result;
                            
                            $initialize_data=json_decode($result);
                        $initialization_url=$initialize_data->data->authorization_url;
     
                            if($result){
                                return redirect($initialization_url);
                            }
           
   
           /////////////////paystack code /////////
           
           
   
    }


    }

    //mark notification as read

    public function marknotificationasread(){
        Auth::user()->unreadNotifications->markAsRead();

        Auth::user()->notifications()->delete();

    return back();
    }



    //test table sourt

    public function testtablesort(Request $request){

        /*
        $from=$request->from;
        $to=$request->to;


        $expense=Expense::where('office',Auth::user()->office)->whereBetween('date', [$from, $to])->get();
        return response()->json($expense);
        */


        if($request->ajax()){
            if($request->from !='' && $request->to !=''){
                
               
                $expense=Expense::where('office',Auth::user()->office)->whereBetween('date', [$request->from, $request->to])->get();
                $sum=Expense::where('office',Auth::user()->office)->whereBetween('date', [$request->from, $request->to])->sum('amount');
            
                
            }

            else{
                $expense=Expense::where('office',Auth::user()->office)->get();
                $sum=Expense::where('office',Auth::user()->office)->sum('amount');
              
            }
         
            return response()->json(['expense' => $expense, 'sum' => $sum ]);
        }
       
    }



    //middleware account 

    public function tablesortincome(Request $request){

            //if request ajax here for income expense 
            if($request->ajax()){
                if($request->from1 !='' && $request->to1 !=''){
                    
                   
                    $income=Receivedpay::where('office',Auth::user()->office)->whereBetween('date', [$request->from1, $request->to1])->get();
                    $sum=Receivedpay::where('office',Auth::user()->office)->whereBetween('date', [$request->from1, $request->to1])->sum('amount');
                
                    
                }
    
                else{
                    $income=Receivedpay::where('office',Auth::user()->office)->get();
                    $sum=Receivedpay::where('office',Auth::user()->office)->sum('amount');
                  
                }
             
                return response()->json(['income' => $income, 'sum' => $sum ]);
            }


    }


    //to download task attachment 

    public function downloadattachment($id){
   $attachment=Task::where('id',$id)->value('attachment');

   $file_path = public_path('taskattachment/'.$attachment);
   return response()->download($file_path);
    }



    //replace to the main index page  

    public function mainindexpage(){
        return view('realindex');
    }


    //client edit admin




    //priva cy policy

    public function privacy(){
        return view('privacy');
    }

    //disclaimer

    public function disclaimer(){
        return view('disclaimer');
    }







public function stepups(Request $request){

    $this->validate($request,[
        'office_email'=>'required|email',
        
    ]);
    dd($request->all());
}

}


