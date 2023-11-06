<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    //office( show login form 

    public function __construct()
    {
     $this->middleware('guest:office')->except('logout');
    }


    public function showLoginForm(){
        return view('office.login');
    }

    //login office submit

    public function postlogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
            'answer'=>'required'
        ]);
        
        if(Auth::guard('office')->attempt(['official_mail' => $request->email, 'password' => $request->password, 'secured_answer' => $request->answer  ], $request->remember)){

            return redirect()->intended(route('office.home'));
        }

    return back()->with('error','Invalid Login Details');//withInput($request->only('email'));
    }



    //office logout 

    public function logout(Request $request){
        Auth::guard('office')->logout();
        return redirect('/');
    }
}
