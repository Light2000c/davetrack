<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $transaction = Transaction::where('user_id', Auth::user()->id)->paginate(7);
        return view('transaction',[
            'transactions'=> $transaction,
        ]);
    }
}
