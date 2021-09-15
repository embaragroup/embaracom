<?php

namespace App\Services\Invoice;

use App\Models\Order\Order;
use App\Repositories\Invoice\InvoiceRepository;

class InvoiceService {

    protected $invoiceRepository;

    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository;
    }

    public function GetStatus(){
        try {
            $status = $this->invoiceRepository->getStatusTransaction();

            if (!$status) {
                return returnCustom('Data Not Exist');
            }

            return $status;
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

    public function DataOrderFirst(){
        try {
            $invoiceFirst = $this->invoiceRepository->DataOrderFirst();
            if(!$invoiceFirst){
                return returnCustom('Data Tidak Ditemukan');
            }

            return $invoiceFirst;
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

}
