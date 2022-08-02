<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // returns the view wish displays the admin login form
    public function index()
    {
        return view('admin\login');
    }

    //validates the admin login form and and automatically login the user is credentials are correct
    public function login(Request $request)
    {

        //validate the form
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        //Logs in the user if credentials are correct
        if (!Auth::attempt($request->only('email', 'password', true))) {
            return back()->with('msg', 'Login was not succesful, please provide the correct email and password.');
        }

        //check if the user making the request is an admin or a customer and takes them to their dashboards
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('product');
        } else {
            return redirect()->route('add-product');
        }
    }
}
