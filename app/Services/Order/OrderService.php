<?php

namespace App\Services\Order;

use App\Models\Order\Order;

class OrderService {

    public function PostOrder($request){
        try {
            $request = Order::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'alamat' => $request['alamat'],
                'pesanan' => $request['pesanan'],
                'total' => $request['total']
            ]);
            return returnCustom('Created Successfully', true);
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }
}
