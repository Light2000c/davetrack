<?php

namespace App\Http\Controllers\admin;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /*
return a view wish desplays the users address
*/
    public function index()
    {
        $addresses = Address::paginate(10);
        return view('admin\address', [
            'addresses' => $addresses,
        ]);
    }
}
