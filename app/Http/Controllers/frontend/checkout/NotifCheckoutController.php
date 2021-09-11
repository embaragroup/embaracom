<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifCheckoutController extends Controller
{
    public function paymentNotif(){
        return view('frontend.pages.checkout.paymentNotif');
    }
}
