<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\SendContactForm;

class HomeController extends Controller
{
    public function index(){
        return view('contact');
    }




    public function submitToMail(Request $request){

       $data= $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
       




        \Notification::route('mail','bipintiwari118@gmail.com')->notify(new SendContactForm($data));
        return redirect()->back()->with('success','Thank you,successfully recive message');
    }
}
