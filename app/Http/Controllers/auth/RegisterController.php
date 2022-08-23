<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    //returns view thats displays the registration form
    public function index()
    {
        return view('auth.register');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    //validate the registration form and automatically log user in
    public function register(Request $request)
    {

        // Get a validator for an incoming registration request.

        $this->validate($request, [
            'name' => 'required|string|max:265',
            'email' => 'required|Unique:users,email',
            'password' => 'required|confirmed',
        ]);

        //   Create a new user instance after a valid registration.

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //Logs user in if the user credentials are successfully stored on database

        if (!Auth::attempt($request->only('email', 'password', true))) {
            return back()->with('error', 'Something went wrong, please try again later.');
        }

        //redirect user to dashboard if successfully logged in
        return redirect()->route('dashboard');
    }
}
