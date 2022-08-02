<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    //returns a view thats displays user address
    public function index()
    {
        $user_address = Address::where('user_id', Auth::user()->id)->first();
        return view('address', [
            'userAddress' => $user_address,
        ]);
    }

    public function store(Request $request)
    {

        //Get a validator for an incoming request to save address
        $this->validate($request, [
            'country' => 'required',
            'address1' => 'required',
            'landmark' => 'required',
            'phone' => 'required',
        ]);

        //check if request has address line 2
        if ($request->has('address2')) {

            //if request has address line 2
            //create a new instance of address adding address line 2
            $success = Address::create([
                'user_id' => $request->user()->id,
                'country' => $request->country,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'landmark' => $request->landmark,
                'phone' => $request->phone,
            ]);
        } else {
            //if request doesn't have address line 2
            //create a new instance of address without adding address line 2
            $success = Address::create([
                'user_id' => $request->user()->id,
                'country' => $request->country,
                'address1' => $request->address1,
                'landmark' => $request->landmark,
                'phone' => $request->phone,
            ]);
        }

        //return back with and error or success message after creating new instance
        if (!$success) {
            return back()->with('error', 'Something went wrong, Please try again later');
        }

        return back()->with('success', 'Your address has been successfully added.');
    }


    //update user address
    public function update(Request $request)
    {

        //Get a validator for an incoming request to update address
        $this->validate($request, [
            'country' => 'required',
            'address1' => 'required',
            'landmark' => 'required',
            'phone' => 'required',
        ]);


        //if request has address line 2
        //create a new instance of address adding address line 2
        if ($request->has('address2')) {

            $success = Address::where('user_id', $request->user()->id)->update([
                'user_id' => $request->user()->id,
                'country' => $request->country,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'landmark' => $request->landmark,
                'phone' => $request->phone,
            ]);
        } else {
            //if request doesn't have address line 2
            //create a new instance of address without adding address line 2
            $success = Address::where('user_id', $request->user()->id)->update([
                'user_id' => $request->user()->id,
                'country' => $request->country,
                'address1' => $request->address1,
                'landmark' => $request->landmark,
                'phone' => $request->phone,
            ]);
        }

        //return back with and error or success message after creating new instance
        if (!$success) {
            return back()->with('error', 'Something went wrong, Please try again later.');
        }

        return back()->with('success', 'Your address has been successfully updated.');
    }
}
