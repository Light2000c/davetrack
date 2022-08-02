<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /*

    */

    public function  __construct()
    {
     $this->middleware('auth');
    }
    public function logout(){
        Auth::logout();

        return redirect()->route('admin-dashboard');
    }
}
