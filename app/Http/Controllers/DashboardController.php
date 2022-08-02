<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    //return view thatd displays user dashboard
    public function index()
    {
        $userAddress = Address::where('user_id', Auth()->user()->id)->first();
        return view('dashboard', [
            'userAddress' => $userAddress,

        ]);
    }

    //update user info
    public function update(Request $request)
    {

        $success = "";
//check if old password ia provided
        if ($request->old_password) {
//Get a validator for an incoming request to update profile
//checks if email matches the old email
            if ($request->email == Auth::user()->email) {
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required',
                    'old_password' => 'required',
                    'password' => 'required|confirmed'
                ]);

                //get details of user making the request
                $user = User::where('id', Auth::user()->id)->first();

                //check if old password matches the password on the database
                if (Hash::check($request->old_password, $user->password)){
                    //update user info on database
                    $success = $request->user()->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);
                }else{
                    //return back with error message if passord don't match the one on database.
                    return back()->with('check', 'Old password is incorrect.');
                }
            } else {

                //Get a validtor for the incoming request
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required|unique:users',
                ]);

                //update the user info database
                $success = $request->user()->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }
        } else {
//if the request doesn't have old password
//checks if email matches email on database
            if ($request->email == Auth::user()->email) {
                //Get a validator for the incomign request
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required',
                ]);

                //update user info on database
                $success = $request->user()->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            } else {
                //Get a validator for the incoming request
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required|unique:users',
                ]);

                $success = $request->user()->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }
        }

        //return back with succes or an error message
        if ($success) {
            return back()->with('success', 'You account has been sucesfully updated');
        } else {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }
}
