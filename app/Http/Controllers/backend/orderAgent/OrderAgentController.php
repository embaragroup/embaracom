<?php

namespace App\Http\Controllers\backend\orderAgent;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class OrderAgentController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'Paid')->orderBy('id', 'desc')->get();
        return view('backend.agent.pages.orders.index', compact('orders'));
    }
}
