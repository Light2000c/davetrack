<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{

    //return a view wish displays all users transactions
    public function index()
    {
        $transaction = Transaction::paginate(10);
        return view('admin\transactions', [
            'transactions' => $transaction,
        ]);
    }

    //updates transactions status
    public function update(Transaction $transaction)
    {
        $status = 'complete';

        //get all orders from with same transaction id
        $order = Order::where('code', $transaction->transact_code);

        //change transaction status
        $transact_success = $transaction->update([
            'status' => $status,
        ]);

        //also change orders status with same transaction id as this transaction
        $order_success =  $order->update([
            'status' => $status,
        ]);


        //if both request to change order and transaction status is successful, return back
        if ($transact_success && $order_success) {

            return back();
        }
    }


    //delete transaction from database
    public function delete(Transaction $transaction)
    {
        $status = 'complete';

        //get all orders with same transaction id as the transaction and store in a variable
        $order = Order::where('code', $transaction->transact_code);

        //delete transaction from database
        $transact_success = $transaction->delete();

        //delete orders with same id as this trnsaction from database
        $order_success =  $order->delete();


        //return back if both the orders and transaction is has been deleted
        if ($transact_success && $order_success) {

            return back();
        }
    }
}
