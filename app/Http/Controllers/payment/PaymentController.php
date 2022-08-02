<?php

namespace App\Http\Controllers\payment;

use App\Models\Cart;
use App\Mail\orderMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

        $newRecord = null;
        $paymentDetails = Paystack::getPaymentData();

        //  dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want

        if ($paymentDetails['status'] === true) {

            $total_cart = Cart::where('user_id', Auth::user()->id)->get();
            $transact_ref = Cart::where('user_id',Auth::user()->id)->first();
            $new_code = $transact_ref->code;

            $transaction = Transaction::create([
              'user_id'=> Auth::user()->id,
              'transact_code' => $new_code,
              'amount' => $paymentDetails['data']['amount'],
              'product_count'=> $total_cart->count(),

            ]);

            $details = [
             'name' => Auth::user()->name,
             'code' => $new_code,
            ];

            $success = Cart::query()
                ->where('user_id', Auth::user()->id)
                ->each(function ($oldRecord) {
                    $newRecord = $oldRecord->replicate();
                    $newRecord->setTable('orders');


                    if ($newRecord->save()) {
                        $oldRecord->delete();
                    }
                });

            if ($transaction && $success) {
                Mail::to(Auth::user()->email)->send(new orderMail($details));
                return redirect()->route('transaction');
            }

        }
    }
}
