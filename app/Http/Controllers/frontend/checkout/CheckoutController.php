<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Http\Controllers\Controller;
use App\Services\Checkout\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $checkoutService;

    public function __construct()
    {
        $this->checkoutService = new CheckoutService;
    }
    public function checkout(){
        return view('frontend.pages.checkout.checkout');
    }

    public function checkOutCart(Request $request){

        $params = $this->checkoutService->checkoutCart($request);

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return redirect('/checkout-details')->with(['snapToken' => $snapToken]);
    }
}
