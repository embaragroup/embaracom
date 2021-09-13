<?php

namespace App\Http\Controllers\frontend\order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService;
    }

    public function PostOrder(Request $request){
        $result = Order::create([
            'first_name' => $request['first_name'],
            'email' => $request['email'],
            'pesanan' => $request['pesanan'],
            'total' => $request['total'],
            'paid_at' => $request['paid_at']
        ]);
        alertNotify($result['status'], $result['message'], $request);
        return redirect('/home');
    }
}
