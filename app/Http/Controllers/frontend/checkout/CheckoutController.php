<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('frontend.pages.checkout.checkout');
    }

    public function checkOutCart(Request $request){
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
        );

        Order::create([
            'first_name' => $params['customer_details']['first_name'],
            'email' => $params['customer_details']['email'],
            'pesanan' => $request['pesanan'],
            'total' => $params['transaction_details']['gross_amount'],
            'paid_at' => 'Belum Dibayar'
        ]);

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return redirect('/checkout-details')->with(['snapToken' => $snapToken]);
    }
}
