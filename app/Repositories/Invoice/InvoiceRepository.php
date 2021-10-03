<?php


namespace App\Repositories\Invoice;

use App\Models\Invoice\Invoice;
use App\Models\Order\Order;

class InvoiceRepository {

    public function DataOrderFirst(){
        $order = Order::with([])->first();
        $firstInvoice = Invoice::where('order_id', $order->id);

        return $firstInvoice->first();
    }
}
