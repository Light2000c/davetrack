<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionDetailsController extends Controller
{
    //return a view which displays all the orders in a particular transaction
    public function index(Transaction $transaction)
    {

        $orders = Order::orderBy('created_at', 'Desc')->where('code', $transaction->transact_code)->paginate(7);
        return view('admin.transaction_details', [
            'transaction' => $transaction,
            'orders' => $orders,
        ]);
    }
}
