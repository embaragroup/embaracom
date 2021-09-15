<?php

namespace App\Services\Payment;

use App\Repositories\Invoice\MidtransRepository;

class MidtransService {
    public function GetCallbackStatus(){
        $httpMethod = 'get';
        $baseUrl = config('apikey.midtrans.base_url');
        $orderIdUrl = isset($_GET['order_id']) ? $_GET['order_id'] : '';
        $path = "v2" . $orderIdUrl . "/status";

        $getStatus = MidtransRepository::request($httpMethod, $baseUrl, $path);
        return response()->json($getStatus);
    }
}
