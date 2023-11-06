<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ContactJob;

class EmailController extends Controller
{
    public function sendcontactmessage(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'

        ]);

        $details=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message
        ];

        //////send email script here
        dispatch(new ContactJob($details));

        return back()->with('display','Thanks for writing to us, will will get in touch with you as soon as possible');
    }
}
