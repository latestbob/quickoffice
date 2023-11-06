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
        $meets=Meeting::where('office',Auth::user()->office)->where('creator',Auth::user()->name)->get();
        $withme=Meeting::where('office',Auth::user()->office)->where('participant',Auth::user()->name)->get();
        return view('staff.schedule',compact('members','meets','withme'));
    }

    //tasks page for staff

    public function tasks(){
        $client=User::where('office',Auth::user()->office)->where('position','client')->get();

        $supervisor=User::where('office',Auth::user()->office)->where('position','admin')->where('name','!=',Auth::user()->name)->get();
        $task=Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->get();
        $staff=User::where('office',Auth::user()->office)->where('position','!=','admin')->where('position','!=','client')->where('name','!=',Auth::user()->name)->get();
        return view('staff.tasks',compact('client','supervisor','task','staff'));
    }


    // staff view task

    public function tasksview($id){
        $task=Task::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();

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

//staff view specific task type

public function viewspecifictaskstaff($task){
 
    //////
    if($task=="pending"){
        //dd('the task is pending');

        $taskss =Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'pending'])->get();

        return view('staff.viewtasktype',compact('taskss','task'));
    }

    elseif($task=="completed"){
       $taskss=Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'completed'])->get();
       return view('staff.viewtasktype',compact('taskss','task'));
    }

    elseif($task=="overdue"){
        $date = date("Y-m-d H:i:s", strtotime('+1 hours'));
      $taskss=Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'pending'])->where('end' ,'<', $date)
      ->orwhere(['office' => Auth::user()->office])->where(['supervisor' => Auth::user()->name])->where(['status' => 'pending'])->where('end' ,'<', $date)->get();
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

}