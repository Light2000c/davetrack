<?php

namespace App\Http\Controllers\products;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index(Transaction $transaction){


        $orders = Order::where('code',$transaction->transact_code)->where('user_id', Auth::user()->id)->paginate(5);
        return view('products.order',[
            'orders'=> $orders,
            'transaction', $transaction,
            'ts' => $transaction
        ]);
    }
}
