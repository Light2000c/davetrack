<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use App\Mail\Testmail;
use App\Mail\MemberMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /*
    returns view that displays admin dashboard
    */
    public function index()
    {
        //get all teammember data from database and return with the view
        $teamMembers = User::where('id', '!=', Auth::user()->id)->paginate(7);
        return view('admin\dashboard', [
            'teamMembers' => $teamMembers
        ]);
    }


    //updates user profile
    public function updateProfile(Request $request)
    {
        //validates the request
        $this->validate($request, [
            'name' => 'required|string|max:365',
            'email' => 'required|email',
        ]);
        //gets the user making the request from database and store in a variable user
        $user = User::where('id', Auth::user()->id);

        //update the user
        $success = $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        //returns back with a success or error message
        if ($success) {
            return back()->with('success', 'Profile successfully Updated.');
        } else {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }


    /*
    validates the request for adding team members and admin dashboard search
    */
    public function postRequest(Request $request)
    {
        $role = 1;

        //condiftional statement to check if request is to add team members
        if ($request->req === "add-member") {

            //if request is to adda team member it validate the form
            $this->validate($request, [
                'a_name' => 'required|string|max:365',
                'a_email' => 'required|unique:users,email',
                'password' => 'required|confirmed',
            ]);

            $url = '/admin/login';

            //stores the the data of the team member on a variable detail
            $details = [
                'email' => $request->a_email,
                'name' => $request->a_name,
                'password' => $request->password,
                'url' => $url,
            ];

            //stores the new teammember detail to database
            $success =   User::create([
                'name' => $request->a_name,
                'email' => $request->a_email,
                'password' => Hash::make($request->password),
                'is_admin' => $role,

            ]);

            //sends a mail message to the new teammember being added
            Mail::to($request->a_email)->send(new MemberMail($details));

            //returns back with a success or error messageif the teammember is successfully added or not
            if ($success) {
                return back()->with('a-success', 'You have successfully added a new team member.');
            } else {
                return back()->with('a-error', 'Something went wrong, Please try again later.');
            }
        }

        //condiftional statement to check if request is to search for somthing
        if ($request->req === "search") {
            //validates the search input box
            $request->validate([
                'search' => 'required',
            ]);

            //redirects to the search page with the search result
            return redirect()->route('search', $request->search);
        }
    }
}
