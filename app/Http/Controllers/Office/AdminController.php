<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;
use Auth;
use App\User;
use App\Report;
use Hash;
use App\Meeting;
use PDF;
use Calendar;
use App\Expense;
use App\Receivedpay;
use App\Notifications\EventNotification;
use App\Task;
use App\Events;
use App\Jobs\Meetings;
use App\Office;
use Carbon\Carbon;
use App\Activity;
use App\Subsidary;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExpenseUpdate;
use App\Mail\Publish;
use App\Mail\Partner;
use App\Mail\TaskReview;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){

        
        $event=Events::where('office',Auth::user()->office)->orderby('id','desc')->take(5)->get();
        $task=Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->orderby('id','desc')->take(10)->get();

        $user=User::where('office',Auth::user()->office)->where('position','!=','client')->get();
        $meeting=Meeting::where('office',Auth::user()->office)->where('participant',Auth::user()->name)->where('accept',NULL)->orderby('id','desc')->take(5)->get();

      
       

    
        return view('admin.home',compact('event','task','user','meeting'));
    }

    //admin staff page

    public function staff(){
        $branch=Branch::where('office',Auth::user()->office)->get();
        $staff=User::where('office',Auth::user()->office)->where('position','!=','client')->get();
        return view('admin.staff',compact('branch','staff'));
    }

    //admin view staff

    public function viewstaff($id){
        $staff=User::find($id);

        return response()->json($staff);
    }

    //admin edit staff

    public function editstaff($id){
        $staff=User::find($id);

        return response()->json($staff);
    }

    //admin edit staff post

    public function editstaffpost(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            // 'password'=>'required',
            'dob'=>'required',
            'phone'=>'required',
            'branch'=>'required',
            'role'=>'required',
            'description'=>'required',
            'id'=>'required',
        ]);

       
        $staff=User::where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'dob'=>$request->dob,
            'phone'=>$request->phone,
            'branch'=>$request->branch,
            'position'=>$request->role,
            'description'=>$request->description,
            // 'password'=>Hash::make($request->password),
        ]);

        return back()->with('msgg','Staff Details Updated Successfully');

    }

    //admin delete staff confirm get request

    public function deletestaff($id){
        $staff=User::find($id);
        return response()->json($staff);
    }


    //admin delete staff post

    public function deletestaffpost(Request $request){
        $this->validate($request,[
            'id'=>'required',
        ]);

        $staff=User::where('id',$request->id)->where('office',Auth::user()->office)->delete();
        
        return back()->with('msgg','Staff removed successfully');
    }
    //admin schedule page

    public function schedule(){

        $members=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();
        


        $meets = Meeting::where(function ($query) {
            $query->where('participant', Auth::user()->name)
                  ->orWhere('creator', Auth::user()->name);
        })->get();


        return view('admin.schedule',compact('meets','members'));
    }

    //admin schedule create meeting

    public function createmeeting(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'start'=>'required',
           
            'participant'=>'required',
            'description'=>'required',
        ]);

        $now_datetime = date("Y-m-d H:i:s", strtotime('+1 hours'));

       

        if($now_datetime > $request->start){
            
            return back()->with("error","You can't choose a past date");
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

          
            return back()->with('msgg','Meeting was created successfully');
        }
    }

    //admin schedule task page

    public function tasks(){

        
        // $currentWeek = date('W');

        // $activity = Activity::where('week',$currentWeek)->get();

        // dd($activity);




        //$task=Activity::where('obligated',Auth::user()->name)->orderBy('business')->paginate(10);
        $task=Activity::where('obligated',Auth::user()->name)->where('status','!=',"Completed")->orderBy('business')->paginate(10);

        $client=User::where('office',Auth::user()->office)->where('position','client')->get();

        $supervisor=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();
        //$task=Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->get();
        $staff=User::where('office',Auth::user()->office)->where('position','!=','admin')->where('position','!=','client')->where('name','!=',Auth::user()->name)->get();
        return view('admin.tasks',compact('client','supervisor','task','staff'));
    }



        // admin view task

        public function tasksview($id){
            $task=Task::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();
    
            return response()->json($task);
        }


         //admin edit task

     public function tasksedit($id){
        $task=Task::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();
        return response()->json($task);
    }


    //admin edit task put

    public function taskeditput(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'status'=>'required'
        ]);

        
        $task=Task::where('id',$request->id)->update([
            'status'=>$request->status,
        ]);

        return back()->with('msg','Task Status Updated successfully');
    }

     //admin delete task confirm get request

     public function taskdelete($id){
        $task=Task::find($id);

        return response()->json($task);
    }



    //admin delete task delete request 

    public function taskdeletedelete(Request $request){
        

        $task=Task::where('id',$request->id)->delete();

        return back()->with('msg','Task Deleted Successfully');
    }


    //admin account page

    public function account(){

        // $expenses = Expense::truncate();
        $expense=Expense::where('office',Auth::user()->office)->orderBy('id', 'desc')->get();
        $receivedpay=Receivedpay::where('office',Auth::user()->office)->get();
        return view('admin.account',compact('expense','receivedpay'));
    }

    //Account update expenses

    public function expensestatus(Request $request){

        $expense = Expense::where('id',$request->id)->update([
            'status' =>$request->status,
            'comments' =>$request->comments,
            'approved_by' => Auth::user()->name,
        ]);

            $expenses = Expense::find($request->id);

            $expense=[
                    
                'title'=>$expenses->title,
                'category'=>$expenses->category,
                'total'=>$expenses->amount,
                'description'=>$expenses->description,
                'status' => $expenses->status,
                'currency' => $expenses->currency,
            
            ];
            $emails = ['oluwakorede.babatunde@laurenparkerway.com', 'accounts@laurenparkerway.com'];

            Mail::to($emails)->send(new ExpenseUpdate($expense));

        return back()->with('msg','Expense status updated successfully');
    }

    //admin message

    public function message(){
        return view('admin.message');
    }
    //admin report page

    public function report(){
        $reports=Report::where('office',Auth::user()->office)->where('reporter',Auth::user()->name)->get();
        return view('admin.report',compact('reports'));
    }

    //admin client page

    public function client(){

        $client=User::where('position','client')->where('office',Auth::user()->office)->get();
        $task=Task::where('office',Auth::user()->office)->get();

        return view('admin.client',compact('client','task'));
    }

    public function clientpost(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
            'phone'=>'required',
            'description'=>'required',
            'office'=>'required'
        ]);

       
        //check if client of that office already exists
        
        $existed=User::where('office',Auth::user()->office)->where('email',$request->email)->where('position','client')->exists();
        
        if($existed){
            return back()->with('error','Client already exists in the office');
        }

        else{

            /*
            $user=new User;
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->phone=$request->phone;
       $user->description=$request->description;
       $user->office=$request->office;
       $user->position='client';
       $user->branch="none";
       $user->dob=date('y-m-d');
       $user->save();

       return back()->with('msg','Client Added successfully');

        */

        ///now query the number of staffs that can be added by each plans
            ///starting with the free plans
            $plan=Office::where('office_name',Auth::user()->office)->value('plan');

            if($plan=="free"){
                //if plan is free plans 
                $maxstaff=5;

                $registerstaff=User::where('office',Auth::user()->office)->where('position','client')->count();

                        if($registerstaff==$maxstaff){
                            return back()->with('error','Maximum Staff for free plan reached');
                        }
                        else{
                            $user=new User;
                            $user->name=$request->name;
                            $user->email=$request->email;
                            $user->password=Hash::make($request->password);
                            $user->phone=$request->phone;
                            $user->description=$request->description;
                            $user->office=$request->office;
                            $user->position='client';
                            $user->branch="none";
                            $user->dob=date('y-m-d');
                            $user->save();
                     
                            return back()->with('msg','Client Added successfully');
                        }// when staff of free plan is lesser than maximum... the else will fire

            }//endif of where plan is free

            elseif($plan=="Starter Plan"||$plan=="Start Plan yearly"){

                    //when plan is starter plan yearly or monthly
                    $maxstaff=20;

                    $registerstaff=User::where('office',Auth::user()->office)->where('position','client')->count();

                    if($registerstaff==$maxstaff){
                        return back()->with('error','Maximum Staff for free plan reached');
                    } //when the number of staff reach twenty 

                    else{
                                $user=new User;
                                $user->name=$request->name;
                                $user->email=$request->email;
                                $user->password=Hash::make($request->password);
                                $user->phone=$request->phone;
                                $user->description=$request->description;
                                $user->office=$request->office;
                                $user->position='client';
                                $user->branch="none";
                                $user->dob=date('y-m-d');
                                $user->save();

                                return back()->with('msg','Client Added successfully');
                        }




            }
           

            else{
                 // when it lifetime plan, like wallsandgates

                 $user=new User;
                 $user->name=$request->name;
                 $user->email=$request->email;
                 $user->password=Hash::make($request->password);
                 $user->phone=$request->phone;
                 $user->description=$request->description;
                 $user->office=$request->office;
                 $user->position='client';
                 $user->branch="none";
                 $user->dob=date('y-m-d');
                 $user->save();
          
                 return back()->with('msg','Client Added successfully');
            } //end of whe
        } //end of main else 
    

    }

    //client edit admin

    public function editclient($id){
        $client=User::find($id);

        return response()->json($client);
    }

    //admin edit client post put

    public function editclientpost(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'phone'=>'required',
            'description'=>'required',
            'id'=>'required'


        ]);

        $client=User::where('id',$request->id)->where('office',Auth::user()->office)->where('position','client')->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'phone'=>$request->phone,
                'description'=>$request->description,

            ]
           
        );

        return back()->with('msg','Client Details updated successfully');

        
    }


    //admin delete client get confirm request

    public function deleteclientget($id){
        $client=User::where('id',$id)->where('office',Auth::user()->office)->where('position','client')->firstOrFail();

        return response()->json($client);
    }
    
    //admin delete client delete

    public function deleteclientpost(Request $request){
        $this->validate($request,[
            'id'=>'required',
        ]);

        $client=User::where('id',$request->id)->where('office',Auth::user()->office)->where('position','client')->delete();

        return back()->with('msg','Client deleted successfully');

    }


    //admin email client get modal
    
    public function emailclient($id){
        $client=User::where('id',$id)->where('office',Auth::user()->office)->where('position','client')->firstOrFail();

        return response()->json($client);
    }


    //admin calendar page

    public function calender(){

        $myevent=Events::where('office',Auth::user()->office)->where('title','Welcome')->get();
        $event=Events::where('office',Auth::user()->office)->exists();

        if($event){
            $eventss=Events::where('office',Auth::user()->office)->get();
            $event_list=[];
    
            foreach($eventss as $key =>$allevent){
                $event_list[]=Calendar::event(
                        $allevent->title,
                        true,
                        new \DateTime($allevent->start),
                        new \DateTime($allevent->end.' +1 day')
                        
                );
                //$calendar=Calendar::addEvents($event_list);
            }
            $calendar=Calendar::addEvents($event_list);
    
            
       
           return view('admin.calendar',compact('calendar','myevent'));
        }

        else{
            return view('admin.calendar');
        }
      
       
    }
    

    //admin add event 

    public function addevent(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'start'=>'required',
            'end'=>'required',
            'description'=>'required',
            'office'=>'required',
        ]);

        $date1 = $request->end; 
        $date2 = $request->start; 
        $today=date('y-m-d');
          
        // Use strtotime() function to convert 
        // date into dateTimestamp 
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        $current=strtotime($today);


        
        if($current > $dateTimestamp2 || $current >$dateTimestamp1){
            return back()->with("error","You can't choose a passed date");
        }
        else{
           
            //when every thin checks

            $event=new Events ;
            $event->title=$request->title;
            $event->start=$request->start;
            $event->end=$request->end;
            $event->office=$request->office;
            $event->description=$request->description;
            $event->createdby=Auth::user()->name;

            $event->save();


            $events=[
                
                'createdby'=>Auth::user()->name,
                'start'=>$request->start,
              
                'title'=>$request->title,
                'end'=>$request->end,
                
            ];

            


        $user=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();

        foreach($user as $users){
           
            $users->notify(new EventNotification($events));
        }

          

            return back()->with('msg','Event created successfully');
           
        }
       

        
    }

    //admin branch/department page

    public function branchdepartment(){

        $branch=Branch::where('office',Auth::user()->office)->where('name','!=','headquarters')->get();
        return view('admin.branchdepartment',compact('branch'));

    }
    //admin add branch post

    public function addbranch(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'office'=>'required',
            'location'=>'required',
        ]);

        $branch=new Branch;
        $branch->name=$request->name;
        $branch->office=$request->office;
        $branch->location=$request->location;
        $branch->save();

        return back()->with('msg','New Branch Created Successfully');
    }

    //admin view branch

    public function viewbranch($id){
        $branch=Branch::find($id);

        //how do I pass the $branch to the model in the same view page

        return response()->json($branch);
    }



    //admin edit branch

    public function editbranch($id){
        $branch=Branch::find($id);
        return response()->json($branch);
    }


    
    //admin edit branch post

    public function editbranchpost(Request $request,$id){
        $this->validate($request,[
            'branch_name'=>'required',
            'branch_location'=>'required',
            'branch_office'=>'required'
        ]);

        $editbranch=Branch::where('id',$id)->update([
            'name'=>$request->branch_name,
            'office'=>$request->branch_office,
            'location'=>$request->branch_location,
        ]);

        return back()->with('msg','Branch was updated successfully');
    }

    //admin delete branch confirm get

    public function deletebranch($id){
        $branch=Branch::find($id);
        return response()->json($branch);
    }


    //admin confirm delete branch post

    public function deletebranchpost(Request $request){
        $this->validate($request,[
            'id'=>'required',
        ]);

        $branch=Branch::where('id',$request->id)->delete();

        return back()->with('msg','Branch was deleted successfully');
    }

    //admin create new staff

    public function createstaff(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'dob'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
            'phone'=>'required',
            'branch'=>'required',
            'position'=>'required',
            'description'=>'required',
            'gender'=>'required'


        ]);

        ///check if the staff already exist


        $existed=User::where('office',Auth::user()->office)->where('email',$request->email)->where('position','!=','client')->exists();
        if($existed){
            return back()->with('error','Staff  already Exist in the office');
        }

        else{
            
            ///now query the number of staffs that can be added by each plans
            ///starting with the free plans
            $plan=Office::where('office_name',Auth::user()->office)->value('plan');

            if($plan=="free"){
                //if plan is free plans 
                $maxstaff=5;

                $registerstaff=User::where('office',Auth::user()->office)->where('position','!=','client')->count();

                        if($registerstaff==$maxstaff){
                            return back()->with('error','Maximum Staff for free plan reached');
                        }
                        else{
                                        $user=new User;
                                        $user->name=$request->name;
                                        $user->dob=$request->dob;
                                        $user->email=$request->email;
                                        $user->password=Hash::make($request->password);
                                        $user->phone=$request->phone;
                                        $user->branch=$request->branch;
                                        $user->position=$request->position;
                                        $user->description=$request->description;
                                        $user->office=Auth::user()->office;
                                        $user->gender=$request->gender;
                                        $user->save();

                                        return back()->with('msg','New User was registered successfully');
                        }// when staff of free plan is lesser than maximum... the else will fire

            }//endif of where plan is free

            elseif($plan=="Starter Plan"||$plan=="Start Plan yearly"){

                    //when plan is starter plan yearly or monthly
                    $maxstaff=20;

                    $registerstaff=User::where('office',Auth::user()->office)->where('position','!=','client')->count();

                    if($registerstaff==$maxstaff){
                        return back()->with('error','Maximum Staff for free plan reached');
                    } //when the number of staff reach twenty 

                    else{
                        $user=new User;
                        $user->name=$request->name;
                        $user->dob=$request->dob;
                        $user->email=$request->email;
                        $user->password=Hash::make($request->password);
                        $user->phone=$request->phone;
                        $user->branch=$request->branch;
                        $user->position=$request->position;
                        $user->description=$request->description;
                        $user->office=Auth::user()->office;
                        $user->gender=$request->gender;
                        $user->save();

                        return back()->with('msg','New User was registered successfully');
                        }




            }
           

            else{
                 // when it lifetime plan, like wallsandgates

                 $user=new User;
                 $user->name=$request->name;
                 $user->dob=$request->dob;
                 $user->email=$request->email;
                 $user->password=Hash::make($request->password);
                 $user->phone=$request->phone;
                 $user->branch=$request->branch;
                 $user->position=$request->position;
                 $user->description=$request->description;
                 $user->office=Auth::user()->office;
                 $user->gender=$request->gender;
                 $user->save();

                 return back()->with('msg','New User was registered successfully');
            } //end of when it life time or basic plans
        }
    }

    //admin report view


    // public function reportview($id){
    //     $report=Report::find($id);

    //     return view('report',compact('report'));
    // }

    //admin generate pdf

    // public function reportpdf($id){
    //     $report=Report::find($id);

    //     $pdf = PDF::loadView('report',compact('report'));
    //     return $pdf->download('report.pdf');
    // }


    //admin profile page

    public function profilepage(){
        return view('admin.profile');
    }

    //admin setting page

    public function settingpage(){
        $branch=Branch::where('office',Auth::user()->office)->get();
        return view('admin.setting',compact('branch'));
    }

    //admin setting page post update

    public function settingpost(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'phone'=>'required',
            'dob'=>'required',
            'branch'=>'required'

        ]);

        $user=User::where('office',Auth::user()->office)->where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

            'phone'=>$request->phone,
            'dob'=>$request->dob,
            'branch'=>$request->branch
        ]);

        return back()->with('msgg','Account details updated successfully, Kindly Logout, and Re-login.');

        
    }


    //view task type   

    public function viewtasktype($task){
        if($task=="pending"){
            //dd('the task is pending');
    
            $taskss =Activity::where(['obligated' => Auth::user()->name])->where(['status' => 'pending'])->get();
    
            return view('admin.viewtasktype',compact('taskss','task'));
        }
    
        elseif($task=="completed"){
           $taskss=Activity::where(['obligated' => Auth::user()->name])->where(['status' => 'completed'])->get();
           return view('admin.viewtasktype',compact('taskss','task'));
        }
    
        elseif($task=="overdue"){ $date = date("Y-m-d H:i:s", strtotime('+1 hours'));
            $taskss=Activity::where(['obligated' => Auth::user()->name])->where(['status' => 'overdue'])->get();
          return view('admin.viewtasktype',compact('taskss','task'));
        }

        elseif($task=="supervised"){
         $taskss=Task::where(['office' => Auth::user()->office])->where(['supervisor' => Auth::user()->name])->get();

         return view('admin.viewtasktype',compact('taskss','task'));
        }
    }



    //delete events

    public function deleteevents($id){
        $events=Events::find($id)->delete();

        return back()->with('msg','Event deleted Successfully');
    }


    public function publictasks(Request $request){
        
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

       $emails = ['oluwakorede.babatunde@laurenparkerway.com', 'edidiong.bobson@asknello.com'];

       Mail::to($emails)->send(new Publish());

       return back()->with('msg','Task Report published successfully');
    }


    //create subsidary expenses



    public function subsidaryexpense(Request $request){


        $existed = Subsidary::where('name',$request->name)->where('expenses',$request->expenses)->exists();

        if($existed){
            $business = $request->name;
            return back()->with('error','Expense already exists for '.$business);
        }
        $expense = new Subsidary;




        $expense->name = $request->name;
        $expense->expenses = $request->expenses;

        $expense->save();
        return back()->with('msgg','Expense Created successfully');
    }


    //admin weekly reports

   
    public function toggle(){
        
        dd('working');
    }


    public function tasksummary(Request $request){

        $currentWeek = '';

        if($request->week){
            $currentWeek = $request->week;
        }

        else{
            $currentWeek = date('W');
        }

        $staffs = User::where('office',Auth::user()->office)->where('position',"!=","Admin")->get();


        return view('admin.tasksummary',compact('staffs','currentWeek'));
    }


    public function summarymonthly(){


        // $currentWeek = '';

        // if($request->week){
        //     $currentWeek = $request->week;
        // }

        // else{
        //     $currentWeek = date('W');
        // }

        $staffs = User::where('office',Auth::user()->office)->where('position',"!=","Admin")->get();


        return view('monthlysummary',compact('staffs'));

        
    }


    //summary name

    public function summaryname(Request $request,$name,$week){
        
        $tasks = Activity::where('obligated',$name)->where('week',$week)->get();

       return view('admin.uniquesummary',compact('name','tasks','week'));
    }



    //unique summary update

    public function unqiuesummaryupdate(Request $request){
        
        $activity = Activity::where('id',$request->id)->update([
            'status' => $request->status,
            'comment' => $request->comment,
        ]);



        $task = Activity::where('id',$request->id)->first();

        $email = User::where('name',$task->obligated)->where('office',Auth::user()->office)->value('email');


        $receiver = [
            'status' => $task->status,
            'comment' => $task->comment,
            'task' => $task->task,
            'admin' => Auth::user()->name,
            'name' => $task->obligated,
        ];


         Mail::to($email)->send(new TaskReview($receiver));

        return back()->with('msg','Task Review submitted successfully');

        
    }


    //remove/delete expenses

    public function removeexpenses(Request $request){
        $expense = Expense::where('id',$request->id)->delete();

        return back()->with('msg','Expense Deleted');
    }
   
}
