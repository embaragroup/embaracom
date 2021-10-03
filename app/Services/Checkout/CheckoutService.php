<?php

namespace App\Services\Checkout;

use App\Models\Invoice\Invoice;
use App\Models\Order\Order;
use App\Repositories\Checkout\CheckoutRepository;

class CheckoutService {

    protected $checkoutRepository;

    public function __construct()
    {
        $this->checkoutRepository = new CheckoutRepository;
    }

    public function checkoutCart($request){
        try {
            $params = $this->checkoutRepository->checkOutCart($request);

            if(!$params){
                return returnCustom('Silakan Buat Order Terlebih Dahulu');
            }

            $order = Order::create([
                'order_id' => $params['transaction_details']['order_id'],
                'first_name' => $params['customer_details']['first_name'],
                'last_name' => $params['customer_details']['last_name'],
                'email' => $params['customer_details']['email'],
                'pesanan' => $request['pesanan'],
                'qty' => $request['qty'],
                'total' => $params['transaction_details']['gross_amount'],
                'status' => 'NULL'
            ]);
            $orderId = $order->id;

            Invoice::create([
                'order_id' => $orderId,
            ]);

            return $params;
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }
}
