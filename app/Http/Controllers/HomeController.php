<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use Auth;
use Calendar;
use App\Branch;
use App\User;
use App\Report;
use PDF;
use Hash;
use App\Task;
use App\Meeting;
use App\Notifications\SupervisedDeleted;
use App\Activity;
use Carbon\Carbon;
use App\Expense;
use App\Payslip;
use App\Subsidary;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalReminder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {

       
      

      
        $event=Events::where('office',Auth::user()->office)->orderby('id','desc')->take(5)->get();
        $task=Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->orderby('id','desc')->take(10)->get();

        $user=User::where('office',Auth::user()->office)->where('position','!=','client')->get();
        $meeting=Meeting::where('office',Auth::user()->office)->where('participant',Auth::user()->name)->where('accept',NULL)->orderby('id','desc')->take(5)->get();
        return view('staff.home',compact('event','task','user','meeting'));
    }



    //schedule page for staff

    public function schedule(){
        $members=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();

        $meets = Meeting::where(function ($query) {
            $query->where('participant', Auth::user()->name)
                  ->orWhere('creator', Auth::user()->name);
        })
        ->where('office', Auth::user()->office)
        ->get();


        return view('staff.schedule',compact('meets','members'));
    }

    //tasks page for staff

    public function tasks(){


     


        $client=User::where('office',Auth::user()->office)->where('position','client')->get();

        $supervisor=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();
        $task=Activity::where('obligated',Auth::user()->name)->where('status','!=',"Completed")->orderBy('business')->paginate(10);
        $staff=User::where('office',Auth::user()->office)->where('position','!=','admin')->where('position','!=','client')->where('name','!=',Auth::user()->name)->get();
        
        return view('staff.tasks',compact('client','supervisor','task','staff'));
    }


    // staff view task

    public function tasksview($id){
        $task=Activity::where('id',$id)->firstOrFail();

        return response()->json($task);
    }

    //staf edit task

    public function tasksedit($id){
        $task=Task::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();
        return response()->json($task);
    }


    //staff edit task put

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


    //staff delete task confirm get request

    public function taskdelete($id){
        $task=Task::find($id);

        return response()->json($task);
    }

    //staff delete task delete request 

    public function taskdeletedelete(Request $request){
        

        ////// Send notification to supervisor //////////////////////////// SupervisedDeleted

   



        ///////////////////////////////////////////////////////////////////

        $findtask=Task::where('id',$request->id)->value('title');
        $supervisor=Task::where('id',$request->id)->value('supervisor');

        $supervised=[
            'data'=>'A task you supervised has been deleted by',
            'deletedby'=>Auth::user()->name,
            
          
            'title'=>$findtask,
           
            
        ];
        
   
        $id=User::where('name',$supervisor)->value('id');

        
        User::find($id)->notify(new SupervisedDeleted($supervised));

        $task=Task::where('id',$request->id)->delete();

     

        




        return back()->with('msg','Task Deleted Successfully');
    }

    //message page for staff

    public function message(){
        return view('staff.message');
    }

    // report page for staff

    public function report(){
        $reports=Report::where('office',Auth::user()->office)->where('reporter',Auth::user()->name)->get();
        return view('staff.report',compact('reports'));
    }



    //staff report pdf

    public function reportpdf($id){
        $report=Report::find($id);

        $pdf = PDF::loadView('report',compact('report'));
        return $pdf->download('report.pdf');
    }
    //clients page for staff

    public function clients(){
        $client=User::where('office',Auth::user()->office)->where('position','client')->get();

        $task=Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->get();
        return view('staff.clients',compact('client','task'));
    }

    //events page for staff

    public function events(){

        $eventss=Events::where('office',Auth::user()->office)->get();
        $event_list=[];

        foreach($eventss as $key =>$allevent){
            $event_list[]=Calendar::event(
                    $allevent->title,
                    true,
                    new \DateTime($allevent->start),
                    new \DateTime($allevent->end.' +1 day')
                    
            );
           // $calendar=Calendar::addEvents($event_list);
        }
        $calendar=Calendar::addEvents($event_list);
        return view('staff.events',compact('calendar','eventss'));

}



//staff event view 
public function eventsview($id){
    $events=Events::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();

    return response()->json($events);
}


//staff profile page route

public function profilepage(){
    return view('staff.profile');
}

//staff setting page

public function staffsetting(){
    $branch=Branch::where('office',Auth::user()->office)->get();
    return view('staff.setting',compact('branch'));
}

//staff setting update

public function staffsettingupdate(Request $request){

    $this->validate($request,[
        'id'=>'required',
        'name'=>'required',
        'email'=>'required|email',
        
        'phone'=>'required',
        'dob'=>'required',
       

    ]);

    $user=User::where('office',Auth::user()->office)->where('id',$request->id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        

        'phone'=>$request->phone,
        'dob'=>$request->dob,
        
    ]);

    return back()->with('msgg','Account details updated successfully.');
}

//staff view specific task type

public function viewspecifictaskstaff($task){
 
    //////
    if($task=="pending"){
        //dd('the task is pending');

        $taskss =Activity::where(['obligated' => Auth::user()->name])->where(['status' => 'pending'])->get();

        return view('staff.viewtasktype',compact('taskss','task'));
    }

    elseif($task=="completed"){
       $taskss=Activity::where(['obligated' => Auth::user()->name])->where(['status' => 'completed'])->get();
       return view('staff.viewtasktype',compact('taskss','task'));
    }

    elseif($task=="overdue"){ $date = date("Y-m-d H:i:s", strtotime('+1 hours'));
        $taskss=Activity::where(['obligated' => Auth::user()->name])->where(['status' => 'overdue'])->get();
      return view('staff.viewtasktype',compact('taskss','task'));
    }

    elseif($task=="supervised"){
     $taskss=Task::where(['office' => Auth::user()->office])->where(['supervisor' => Auth::user()->name])->get();

     return view('staff.viewtasktype',compact('taskss','task'));
    }
}



// hide hints 

public function staffhinthide(){
    $user=User::where('office',Auth::user()->office)->where('name',Auth::user()->name)->update([
        'hint'=>'false',
    ]);

    return back();
}



public function staffexpenses(){

    $subsidary = Subsidary::distinct()->pluck('name');
    // dd($subsidary);

    if(Auth::user()->name == 'Oluwakorede Babatunde'){
        $expense = Expense::where('office',Auth::user()->office)->orderBy('id', 'desc')->get();
    }
    else{
        $expense = Expense::where('office',Auth::user()->office)->where('accountant',Auth::user()->name)->orderBy('id', 'desc')->get();
    }
    return view('staff.expenses',compact('expense','subsidary'));
}


//get unique business expenses

public function staffexpenseunique(Request $request){
    $expense = Subsidary::where('name',$request->name)->get();

    return response()->json($expense);
}



///expense reminder

public function expensereminder(Request $request){
$expenses = Expense::find($request->id);

$expense=[
          
    'title'=>$expenses->title,
    'category'=>$expenses->category,
    'total'=>$expenses->amount,
    'description'=>$expenses->description,
   
];

$emails = ['uzor@laurenparkerway.com','zainab@laurenparkerway.com'];
Mail::to($emails)->send(new ApprovalReminder($expense));


return back()->with('msg','Expense approval reminder sent successfully');
}






// staff payslip page


public function staffpayslip(){

    $users = User::where('office',Auth::user()->office)->where('position','!=','admin')->get();

    return view('staff.payslip',compact('users'));
}

// employee payslip add 


public function staffpayslipadd(Request $request){

    $payslip = new Payslip;

  
    $payslip->name = $request->name;
    $payslip->position = $request->position;
    $payslip->pay_period = $request->pay_period;
    $payslip->days_work  = $request->days_work;
    $payslip->annual_gross = $request->annual_gross;
    $payslip->monthly_gross = $request->monthly_gross;
    $payslip->basic = $request->basic;
    $payslip->housing = $request->housing;
    $payslip->transport = $request->transport;
    $payslip->others = $request->others;
    $payslip->paye = $request->paye;
    $payslip->pension = $request->pension;
    $payslip->nhf  = $request->nhf;
    $payslip->loan = $request->loan;

    $payslip->save();


    return back()->with('msg','Employee Payslip added successfully');

    
    
    
}



}