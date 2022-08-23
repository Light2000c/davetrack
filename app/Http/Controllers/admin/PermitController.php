<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermitController extends Controller
{
    public function update(User $user, Request $request)
    {

        $success = '';
        $success2 = '';

        if ($request->has('add')) {
            $permit = 1;
            $success =  User::where('id', $user->id)->update([
                'permission' => $permit,
            ]);
        }

        if ($request->has('remove')) {
            $permit = 0;
            $success2 =  User::where('id', $user->id)->update([
                'permission' => $permit,
            ]);
        }

        if ($success) {
            return back()->with('success', 'You have successfully given member permission to edit product');
        }if ($success2) {
            return back()->with('success', 'member no longer have permissions to make edits on product');
        }
         else {
            return back()->with('error', 'Something went wrong please try again later.');
        }

       
    }
}
