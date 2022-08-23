<?php

namespace App\Http\Controllers;


use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function contactus(Request $request){
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',
        ]);

        $details = [
            'name'=> $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        if(Mail::to('clintononitsha20@gmail.com')->send(new Contact($details))){
            return back()->with('success', 'Your message have been successfully sent, you\'ll get a reply from us soon.');
        }else{
            return back();
        }
    }
}
