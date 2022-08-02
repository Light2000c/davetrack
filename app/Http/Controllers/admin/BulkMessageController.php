<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Mail\BulkMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BulkMessageController extends Controller
{
    /*
    return a view that displays where to type message
     */
    public function index(){
        return view('admin\bulkMessage');
    }

    /*
    validates the form request and send mail
    */
    public function send(Request $request){

        $success = "";
        //get all users from database and store in a variable user
        $users = User::get();

        //validates the request form sent
        $this->validate($request,[
            'subject' => 'required|string|max:350',
            'title' => 'required|string|max:350',
            'message' => 'required',
        ]);

        //stores the form data in an array details
        $details = [
          'subject'=> $request->subject,
          'title' => $request->title,
          'message' => $request->message,
        ];

        //loops through the users to send the mail message to every user
        foreach($users as $user){

            $username = $user->name;
           $success = Mail::to($user->email)->send(new BulkMail($details, $username));
        }

        if($success){
            return back()->with('success','Message has been successfully sent.');
        }else{
            return back()->with('error','Something went wrong please try again later.');
        }

    }
}
