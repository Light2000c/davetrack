<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Controller
{
    //return a view which diplays a form to reset password
    public function index()
    {

        return view('admin\resetPassword');
    }

    //gets new password from user after form validation
    public function store(Request $request)
    {
        $success = "";
        //validates the request being sent from user
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        //get the user making the request details from database and store in a variable user
        $user = User::where('id', Auth::user()->id)->first();

        //conditional statement to check if the user old password matches the password on database
        if (Hash::check($request->old_password, $user->password)) {
            /*
            stores new password on database if old password matches
            */
            $success = $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        //returns back with an error message or success message
        if ($success) {
            return back()->with('success', 'Your password has been successfully changed.');
        } else {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }
}
