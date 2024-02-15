<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Office;
use App\User;
use App\Task;
use App\Report;
use App\Receivedpay;
use Auth;

class HomeController extends Controller
{
    //if Auth
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $office=Office::all();
        return view('officeadmin.home',compact('office'));
    }


    //all active office
    public function active(){

        $office=Office::where('active','true')->get();
        return view('officeadmin.active',compact('office'));
    }


    //all inactive office 
    public function inactive(){
        $office=Office::where('plan','!=','free')->where('active','false')->get();
        return view('officeadmin.inactive',compact('office'));
    }

    //all free plan office
    
    public function freeplans(){
        $office=Office::where('plan','starterfree')->orWhere('plan','basicfree')->orWhere('plan','professionalfree')->orWhere('plan','businessfree')->orWhere('plan','enterprisefree')->get();
        return view('officeadmin.freeplans',compact('office'));
    }


    //specific office modal

  public function specificeoffice($id){
      $offices=Office::find($id);

      return response()->json($offices);
  }

  //get office to edit  

  public function specificofficeedit($id){
      $offices=Office::find($id);
      return response()->json($offices);
  }

  //Specific office delete

  public function specificofficedelete(Request $request, $id){
      $offices = Office::find($id)->delete();
      return back()->with('msg',"Office Deleted Successfully");
      
      
  }


  //edit specifi offic epost

  public function posteditspecificoffice(Request $request){
      $this->validate($request,[
            
            'office_name'=>'required',
            
            'office_plan'=>'required',
            'office_active'=>'required',
           
           

      ]);

      $office= Office::where('office_name',$request->office_name)->update([
          "plan" => "lifeplan",
          "active" => "true",
          "type" => "",
          
      ]);


      return back();

    //   $office=Office::where('id',$request->id)->value('office_name');
      
    //   //update office
    //   $update_office=Office::where('office_name',$office)->update([
    //       'office_name'=>$request->office_name
    //   ]);

    //   //update all the users with the office

    //   $user=User::where('office',$office)->update([
    //     'office'=>$request->office_name
    //   ]);
    //   //update all task where office is office_name
    //   $task=Task::where('office',$office)->update([
    //         'office'=>$request->office_name
    //   ]);

    //   //update all report where office is office 

    //   $report=Report::where('office',$office)->update([
    //         'office'=>$request->office_name
    //   ]);

    //   //upate all receive pay office 

    //   $receivedpay=Receivedpay::where('office',$office)->update([
    //         'office'=>$request->office_name
    //   ]);

      //update all meeting were office

 /////////////////////////////////////////////////////////////////////////////////////////////////////
 ///////////////////////////////Continue from Here///////////////////////////////////////////////////
 
  }
}






