<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events;
use Auth;
use App\Expense;
use Calendar;
use App\Office;
use App\Branch;
use App\Meeting;
use App\Invoice;
use App\Report;
use Hash;
use App\Notifications\SupervisedDeleted;
use App\Expensecategory;
use PDF;
use App\Receivedpay;
use App\User;
use App\Task;
use App\Officejobs;
class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //account home dashboard
    public function home(){
        $event=Events::where('office',Auth::user()->office)->orderby('id','desc')->take(5)->get();
        $task=Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->orderby('id','desc')->take(10)->get();

        $user=User::where('office',Auth::user()->office)->where('position','!=','client')->get();
        $meeting=Meeting::where('office',Auth::user()->office)->where('participant',Auth::user()->name)->where('accept',NULL)->orderby('id','desc')->take(5)->get();

      
       

    
        return view('account.home',compact('event','task','user','meeting'));
    }

    //account schedule page
    public function schedule(){
        $members=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();
       
       // $members=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();
        


        $meets = Meeting::where(function ($query) {
            $query->where('participant', Auth::user()->name)
                  ->orWhere('creator', Auth::user()->name);
        })
        ->where('office', Auth::user()->office)
        ->get();


        return view('admin.schedule',compact('meets','members'));
    }
    // account task page

    public function tasks(){
        $client=User::where('office',Auth::user()->office)->where('position','client')->get();

        $supervisor=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();
        $task=Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->get();
        $staff=User::where('office',Auth::user()->office)->where('position','!=','admin')->where('position','!=','client')->where('name','!=',Auth::user()->name)->get();
        return view('account.tasks',compact('client','supervisor','task','staff'));
    }

      // account view task

      public function tasksview($id){
        $task=Task::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();

        return response()->json($task);
    }

     //account edit task

     public function tasksedit($id){
        $task=Task::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();
        return response()->json($task);
    }


    
    //account edit task put

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



      //account delete task confirm get request

      public function taskdelete($id){
        $task=Task::find($id);

        return response()->json($task);
    }

    //account delete task delete request 

    public function taskdeletedelete(Request $request){
        
       /////// ///SEND NOTIFICATION TO SUPERVISOR HERE///////////////

       $findtask=Task::where('id',$request->id)->value('title');
       $supervisor=Task::where('id',$request->id)->value('supervisor');

       $supervised=[
           'data'=>'A task you supervised has been deleted by',
           'deletedby'=>Auth::user()->name,
           
         
           'title'=>$findtask,
          
           
       ];
       
  
       $id=User::where('name',$supervisor)->value('id');

       
       User::find($id)->notify(new SupervisedDeleted($supervised));

       ///////// end of send supervisor notification  



        $task=Task::where('id',$request->id)->delete();

        return back()->with('msg','Task Deleted Successfully');
    }





    //account accounts page

    public function accounts(){
        $client=User::where('office',Auth::user()->office)->where('position','client')->get();
        $expenses=Expense::where('office',Auth::user()->office)->get();
        $receivedpay=Receivedpay::where('office',Auth::user()->office)->get();
        $category=Expensecategory::where('office',Auth::user()->office)->get();
        return view('account.accounts',compact('client','expenses','receivedpay','category'));
    }

    //accountant add expenses

    public function addexpenses(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'date'=>'required',
            'amount'=>'required',
            'description'=>'required',
            'category'=>'required'
            
        ]);

        $month=date('M-Y',strtotime($request->date));
        

        $expense=new Expense;
        $expense->title=$request->title;
        $expense->date=$request->date;
        $expense->amount=$request->amount;
        $expense->description=$request->description;
        $expense->office=Auth::user()->office;
        $expense->accountant=Auth::user()->name;
        $expense->category=$request->category;
        $expense->month=$month;
        $expense->save();

        return back()->with('msg','Expenses was added successfully');

        
    }

    //acountant edit expenses

    public function editexpense($id){
        $expense=Expense::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();
        return response()->json($expense);
    }

    //accountant edit expenses put

    public function editexpensepost(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'title'=>'required',
            'date'=>'required',
            'amount'=>'required',
            'description'=>'required',
        ]);

        $expense=Expense::where('id',$request->id)->where('office',Auth::user()->office)->update([
            'title'=>$request->title,
            'date'=>$request->date,
            'amount'=>$request->amount,
            'description'=>$request->description
        ]);

        return back()->with('msg','Expenses was updated successfully');
    }

    //accountant delete get request

    public function deletegetrequest($id){
        $expense=Expense::where('id',$id)->where('office',Auth::user()->office)->where('accountant',Auth::user()->name)->firstOrFail();
        return response()->json($expense);
    }

    //account delete expenses, delete request

    public function deletedelete(Request $request){
        $this->validate($request,[
            'id'=>'required',
            
        ]);
        $expense=Expense::where('id',$request->id)->where('office',Auth::user()->office)->where('accountant',Auth::user()->name)->delete();

        return back()->with('msg','Expense deleted successfully');
    }


    //account received pay post 

    public function receivecpaypost(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'date'=>'required',
            'amount'=>'required',
            
            'description'=>'required'
            
        ]);

        if($request->job && $request->source){
           return back()->with('error','Either select job from client or other source');

        }
        elseif(!$request->job && !$request->source){
            return back()->with('error','Either select job from client or other source'); 
        }

       

        elseif($request->job){
            $month=date('M-Y',strtotime($request->date));

        $receivedpay=new Receivedpay;
        $receivedpay->title=$request->title;
        $receivedpay->date=$request->date;
        $receivedpay->amount=$request->amount;
        $receivedpay->client=$request->client;
        $receivedpay->description=$request->description;
        $receivedpay->office=Auth::user()->office;
        $receivedpay->accountant=Auth::user()->name;
        $receivedpay->month=$month;
        $receivedpay->job=$request->job;
        $receivedpay->save();

        return back()->with('msg','Received payment was added successfully');
        }

        else{

            $month=date('M-Y',strtotime($request->date));

        $receivedpay=new Receivedpay;
        $receivedpay->title=$request->title;
        $receivedpay->date=$request->date;
        $receivedpay->amount=$request->amount;
        $receivedpay->client='othersource';
        $receivedpay->description=$request->description;
        $receivedpay->office=Auth::user()->office;
        $receivedpay->accountant=Auth::user()->name;
        $receivedpay->month=$month;
        $receivedpay->job=$request->job;
        $receivedpay->othersource=$request->source;
        $receivedpay->save();

        return back()->with('msg','Received payment was added successfully');
        }
    
  
       

      

        
    }

    //account received pay edit 
    
    public function receivepayedit($id){
        $receivedpay=Receivedpay::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();

        return response()->json($receivedpay);
    }

    //account received pay edit put

    public function receivedpayeditput(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'title'=>'required',
            'date'=>'required',
            'amount'=>'required',
            
            'description'=>'required'
            
        ]);

        $receivedpay=Receivedpay::where('id',$request->id)->where('office',Auth::user()->office)->update([
            'title'=>$request->title,
            'date'=>$request->date,
            'amount'=>$request->amount,
        
            'description'=>$request->description,
        ]);

        return back()->with('msg','Payment Details was updated');
    }

    //account delete received get request

    public function deletereceivedget($id){
        $receivedpay=Receivedpay::where('id',$id)->where('office',Auth::user()->office)->where('accountant',Auth::user()->name)->firstOrFail();

        return response()->json($receivedpay);

    }

    //account delete received delete delete request

    public function deletereceivedpaymentdelete(Request $request){
        $this->validate($request,[
            'id'=>'required',
        ]);


            $receivedpay=Receivedpay::where('id',$request->id)->where('office',Auth::user()->office)->where('accountant',Auth::user()->name)->delete();
            return back()->with('msg','Payment record was deleted successfully');
    }






    //account message page

    public function message(){
        return view('account.message');
    }

    //account report page

    public function reports(){
        $reports=Report::where('office',Auth::user()->office)->where('reporter',Auth::user()->name)->get();
        return view('account.reports',compact('reports'));
    }

    //account client page 

    public function clients(){
        //$client=User::where('office',Auth::user()->office)->where('position','client')->get();

        $client=User::where('position','client')->where('office',Auth::user()->office)->get();
        $task=Task::where('office',Auth::user()->office)->get();

    

        $task=Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->get();
        return view('account.clients',compact('client','task'));
    }

    //account events page

    public function events(){

        $eventss=Events::where('office',Auth::user()->office)->get();
        $event=[];

        if($eventss->count()){
            foreach($eventss as $key =>$allevent){
               $event[]=Calendar::event(
                        $allevent->title,
                        true,
                        new \DateTime($allevent->start),
                        new \DateTime($allevent->end.' +1 day')
                        
                );
                $calendar=Calendar::addEvents($event);
            }
        }


        
    
       return view('account.events',compact('calendar','eventss'));




        
    }

    //account view specific event

    public function eventsview($id){
        $events=Events::where('id',$id)->where('office',Auth::user()->office)->firstOrFail();

        return response()->json($events);
    }


        //admin generate pdf

        public function reportpdf($id){
            $report=Report::find($id);
    
            $pdf = PDF::loadView('report',compact('report'));
            return $pdf->download('report.pdf');
        }

        //account invoice


        public function invoice(){
            $client=User::where('office',Auth::user()->office)->where('position','client')->get();

            $invoice=Invoice::where('office',Auth::user()->office)->where('creator',Auth::user()->name)->get();


            return view('account.invoice',compact('client','invoice'));
        }

        //invoice account post

        public function invoicepost(Request $request){
            $this->validate($request,[
                'client'=>'required',
                'description'=>'required',
                'vat'=>'required',
                'subtotal'=>'required'

            ]);
            $office=Office::where('office_name',Auth::user()->office)->value('id');
            $officetostring=strval($office);
            
            $min=1000;
            $max=150000;
            $mix=rand($min,$max);
            $tostring=strval($mix);

            $invoiceid=$officetostring.$tostring;
            
            
            $invoice=new Invoice;
            $invoice->invoiceid=$invoiceid;
            $invoice->creator=Auth::user()->name;
            $invoice->office=Auth::user()->office;
            $invoice->client=$request->client;
            $invoice->description=$request->description;
            $invoice->subtotal=$request->subtotal;
            $invoice->vat=$request->vat;
            $invoice->shipping=$request->shipping;
          

            $vat=($request->vat/100) * $request->subtotal;
            $total=$vat+$request->subtotal+$request->shipping;
            $invoice->total=$total;
            $invoice->save();
            

            return back()->with('msg','Invoice Create Successfully');

            

            

        }

        //invoice generate

        public function invoicegenerate($id){
            $invoice=Invoice::find($id);
    
            $pdf = PDF::loadView('invoice',compact('invoice'));
            $invoice->delete();
            return $pdf->download('invoice.pdf');
        }


        //account profile page

        public function profilepage(){
           
            return view('account.profile');
        }

        //account setting page

        public function settingpage(){
            $branch=Branch::where('office',Auth::user()->office)->get();
            return view('account.setting',compact('branch'));
        }

        //account setting update put

        public function settingupdate(Request $request){
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


        ///account job page

        public function jobs(){
            $client=User::where('office',Auth::user()->office)->where('position','client')->get();
            $job=Officejobs::where('office',Auth::user()->office)->get();
            return view('account.jobs',compact('client','job'));
        }

        public function addexpensecategory(Request $request){
           
               $this->validate($request,[
                   'addcategory'=>'required',
               ]);

               $category=new Expensecategory;
               $category->name=$request->addcategory;
               $category->office=Auth::user()->office;
               $category->save();

           // return back();

           return response()->json(['message'=>'Added succesffuly']);

        
        }

        ///get jobs for specific client

        public function jobsforclient($client){
            $job=Officejobs::where('client',$client)->get();

            return response()->json($job);
        }

        //account expenses statement

        public function expensestatement(){
            $date=date('M-Y');
            $client=User::where('office',Auth::user()->office)->where('position','client')->get();
            $expenses=Expense::where('office',Auth::user()->office)->where('category','!=','Administrative Expenses')->where('month',$date)->get();
            
            $administrative=Expense::where('office',Auth::user()->office)->where('category','Administrative Expenses')->where('month',$date)->get();
            $category=Expensecategory::where('office',Auth::user()->office)->get();
            return view('account.expensestatement',compact('client','expenses','category','administrative'));
            
        }

        //account create jobs 

        //create job 

        public function createnewjob(Request $request){
            $job=new Officejobs;
            $job->title=$request->title;
            $job->client=$request->client;
            $job->descriptions=$request->description;
            $job->office=Auth::user()->office;
            $job->accountant=Auth::user()->name;
            $job->amount=$request->amount;
    
            $job->save();
           
    
            return response()->json($job);
    
        }

        //account income statement

        public function incomestatement(){
            $date= date('M-Y');
            $income=receivedpay::where('office',Auth::user()->office)->where('job','!=',null)->where('month',$date)->get();
            $incomeothers=receivedpay::where('office',Auth::user()->office)->where('othersource','!=',null)->where('month',$date)->get();

            $otherexpenses=Expense::where('office',Auth::user()->office)->where('category','!=','Administrative Expenses')->where('month',$date)->get();
            $administrative=Expense::where('office',Auth::user()->office)->where('category','Administrative Expenses')->where('month',$date)->get();
            return view('account.incomestatement',compact('income','incomeothers','otherexpenses','administrative'));

        }

        //account view specifice task type

        public function viewspeciftasktype($task){
              //////
    if($task=="pending"){
        //dd('the task is pending');

        $taskss =Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'pending'])->get();

        return view('account.viewtasktype',compact('taskss','task'));
    }

    elseif($task=="completed"){
       $taskss=Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'completed'])->get();
       return view('account.viewtasktype',compact('taskss','task'));
    }

    elseif($task=="overdue"){
        $date = date("Y-m-d H:i:s", strtotime('+1 hours'));
      $taskss=Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'pending'])->where('end' ,'<', $date)
      ->orwhere(['office' => Auth::user()->office])->where(['supervisor' => Auth::user()->name])->where(['status' => 'pending'])->where('end' ,'<', $date)->get();
      return view('account.viewtasktype',compact('taskss','task'));
    }

    elseif($task=="supervised"){
     $taskss=Task::where(['office' => Auth::user()->office])->where(['supervisor' => Auth::user()->name])->get();

     return view('account.viewtasktype',compact('taskss','task'));
    }
        }



        //income statment here 

        public function incomestatmentss(){

            //return view('account.realincomestatement');
           // $income=receivedpay::where('office',Auth::user()->office)->where('') 

           $jobforclient=receivedpay::where('office',Auth::user()->office)->where('job','!=',null)->sum('amount');

           $othersource=receivedpay::where('office',Auth::user()->office)->where('othersource','!=',null)->get();

           $grossincome=receivedpay::where('office',Auth::user()->office)->sum('amount');


           //expenses section

           $otherexpenses=Expense::where('office',Auth::user()->office)->where('category','!=','Administrative Expenses')->get();
            $totalotherexpense=Expense::where('office',Auth::user()->office)->where('category','!=','Administrative Expenses')->sum('amount');
           $administrative=Expense::where('office',Auth::user()->office)->where('category','Administrative Expenses')->sum('amount');

            $totalexpense=$administrative +  $totalotherexpense;

            $netincome=$grossincome - $totalexpense ;
           
            $pdf = PDF::loadView('account.realincomestatement',compact('jobforclient','othersource','grossincome','otherexpenses','administrative','totalexpense','netincome'));
            return $pdf->download('accountstatement.pdf');
        }


        //get all expense category

        public function getallexpensecategory(){
            $expensecategory=Expensecategory::where('office',Auth::user()->office)->get();

            return response()->json($expensecategory);
        }


        //account add client 

        public function accountclientpost(Request $request){
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


        //account all jobss 

        public function accountalljobs(){
            return view('account.jobs');
        }

        //account hint hide

        public function accounthinthide(){
            $user=User::where('office',Auth::user()->office)->where('name',Auth::user()->name)->update([
                'hint'=>'false',
            ]);
        
            return back();
        }




        // ACCOUNT EXPENSE PAGE

        public function accountexpenses(){
            return view('account.expenses');
        }
}

