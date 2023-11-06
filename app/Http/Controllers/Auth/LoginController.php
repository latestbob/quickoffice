<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Office;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request){
        $this->validate($request,[

            'email'=>'required|email',
            'password'=>'required',
            'office'=>'required'
        ]);

        
        //checking if user is authenticated

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'office' => $request->office])){

           
           // return redirect()->intended(route('home'));

                    if(Auth::user()->position=='admin'){ //check if the user is admin
                        return redirect()->intended(route('admin.home'));
                    }

                    elseif(Auth::user()->position=='account'){ //check if the user is an accountant
                        return redirect()->intended(route('account.home'));
                    }

                    elseif(Auth::user()->position=='staff'){
                        return redirect()->intended(route('home')); //for others
                    }
                    else{
                        return redirect('/');
                    }
         }
         return back()->with('error','Invalid email or password');//withInput($request->only('email'));

        
    }

    //logout 

    //straight office showloginform

    public function showofficelogin($name){
        $office_check=Office::where('office_name',$name)->exists();
        //$office_check=Office::where('office_name',$office)->where('active','true')->where('status','success')->exists();

        if($office_check){ //where offfice exists
            $active_office=Office::where('office_name',$name)->where('active','true')->where('status','success')->exists();
            $free_expired=Office::where('type','free')->where('office_name',$name)->where('active','false')->exists();

            $subscribed_expired=Office::where('type','subscribed')->where('active','false')->exists();

                if($active_office){ //when office subscription is active
                    $company=Office::where('office_name',$name)->firstOrFail();
                    return view('office.login',compact('company'));
                 }

                 elseif($free_expired){
                     $company=Office::where('office_name',$name)->where('active','false')->firstOrFail();
                     return view('office.tosubscribe',compact('company'));
                 }

                 elseif($subscribed_expired){
                     $company=Office::where('office_name',$name)->where('type','subscribed')->where('active','false')->firstOrFail();
                     return view('office.resubscription',compact('company'));

                 }

               
                 /*
                 elseif($free_office_with_expired_trial){ //when office is free plan and trial date expired and active false
                    $company=Office::where('office_name',$name)->firstOrFail();
                    return view('office.tosubscribe',compact('company'));
                 }

                else{
                    $company=Office::where('office_name',$name)->firstOrFail();
                    return view('office.resubscription',compact('company'));
                }
                */
            
         } //end of when office exists



        else{  //where the office does not exists
            return redirect('/')->with('error','Company not found');
            
        }
    }


   
    /////login
    public function showofficeloginpost(Request $request){
        $this->validate($request,[

            'email'=>'required|email',
            'password'=>'required',
            'office'=>'required'
        ]);

                //checking if user is authenticated

                if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'office' => $request->office])){

           
                    // return redirect()->intended(route('home'));
         
                             if(Auth::user()->position=='admin'){ //check if the user is admin
                                 return redirect()->intended(route('admin.home'));
                             }
         
                             elseif(Auth::user()->position=='account'){ //check if the user is an accountant
                                 return redirect()->intended(route('account.home'));
                             }
         
                             elseif(Auth::user()->position=='staff'){
                                 return redirect()->intended(route('home')); //for others
                             }

                             elseif(Auth::user()->position=='client'){
                                return redirect()->intended(route('client.home')); //for others
                            }
                             else{
                                 return redirect('/');
                             }
                  }
                  return back()->with('error','Invalid email or password');//withInput($request->only('email'));



    }



   
}
