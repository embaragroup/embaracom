<?php


namespace App\Repositories\Invoice;

use App\Models\Invoice\Invoice;

class InvoiceRepository {

    public function getStatusTransaction(){
        $status = isset($_GET['transaction_status']) ? $_GET['transaction_status'] : '';

        return $status;
    }

    public function DataOrderFirst(){
        $orderIdUrl = isset($_GET['order_id']) ? $_GET['order_id'] : '';
        $firstInvoice = Invoice::where('order_id', $orderIdUrl);

        return $firstInvoice->first();
    }
}
