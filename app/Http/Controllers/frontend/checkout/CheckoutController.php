<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('frontend.pages.checkout.checkout');
    }

    public function checkOutCart(Request $request){

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-SSGsDhFa1iFZLzfG267Stan5';
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
                'first_name' => 'Zulfikar',
                'last_name' => 'Alisunan',
                'email' => 'zulfikar@importir.co',
                'phone' => '08994407084',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return redirect('/checkout-details')->with(['snapToken' => $snapToken]);
    }
}
