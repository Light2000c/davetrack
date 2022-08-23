<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    //return a view which displays all users infomation
    public function index(){
        $users = User::orderBy('created_at', 'Desc')->where('is_admin', 0)->paginate(7);
        return view('admin.users',[
            'users' => $users,
        ]);
    }


    //delete user information from database
    public function delete(User $user){

        //get user from database and store in a variable users
       $users = User::where('id', $user->id);

       //delete user from database
      $success = $users->delete();

      //if user successfully deleted return back
       if($success){
        return back();
       }else{
        return back();
       }
    }
}
