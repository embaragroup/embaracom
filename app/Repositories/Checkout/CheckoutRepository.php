<?php

namespace App\Repositories\Checkout;
use Illuminate\Support\Facades\Auth;

class CheckoutRepository {

    public function checkOutCart($request){

        \Midtrans\Config::$serverKey = config('apikey.midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' =>  (int)$request->total + 5000,
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
