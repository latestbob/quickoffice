<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logoutadmin');
    }

    public function showLoginForm(){
        return view('officeadmin.login');
    }

    //login form post

    public function submitloginform(Request $request){
        
            $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required|min:8'
            ]);
    
            if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->intended(route('mainadmin.home'));
            
            }
            return back()->with('error','Invalid email or password');
       
    
        
    }



    public function logoutadmin(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
