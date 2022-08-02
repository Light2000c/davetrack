<?php

namespace App\Http\Controllers\admin;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /*
    returns a view which displays all users orders
    */
    public function index(){
        $order = Order::paginate(6);
        return view('admin\order',[
            'orders'=> $order,
        ]);
    }
}
