<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class NotifCheckoutController extends Controller
{
    public function paymentNotif(){
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = config('apikey.midtrans.server_key');
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    echo "Transaction order_id: " . $order_id ." is challenged by FDS";
                } else {
                    echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            return $this->change_status($order_id, "Paid");
        } else if ($transaction == 'pending') {
            return $this->change_status($order_id, "Pending");
        } else if ($transaction == 'deny') {
            return $this->change_status($order_id, "Deny");
        } else if ($transaction == 'expire') {
            return $this->change_status($order_id, "Expire");
        } else if ($transaction == 'cancel') {
            return $this->change_status($order_id, "Cancel");
        }
    }

    private function change_status($order_id, $status) {
        $order = Order::where('order_id', $order_id)->first();
        if ($order) {
            $order->update([
                'status' => $status,
            ]);
        }
    }
}
