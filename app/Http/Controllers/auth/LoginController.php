<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //return a view that display th user login form
    public function index(){
        return view('auth.login');
    }

//validates the user login form and process login
    public function login(Request $request){

        //validates the user input
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
          ]);

          //conditional statement to check if the user credentials are correct
          /*
          if credential are not correct return back with an error message
          */
          if(!Auth::attempt($request->only('email', 'password', true))){
           return back()->with('error', 'Something went wrong, Please check Login details and try again.');
          }

          //if credentials are correct take user to the database
          return redirect()->route('dashboard');
    }

}
