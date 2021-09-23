<?php

namespace App\Repositories\Checkout;
use Illuminate\Support\Facades\Auth;

class CheckoutRepository {

    public function checkOutCart($request){

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('apikey.midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' =>  (int)$request->total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ),
            'callbacks' => array(
                'finish' => config('apikey.midtrans.redirect_url')
            )
        );

        return $params;
    }
}
