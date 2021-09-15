<?php

namespace App\Services\Invoice;

use App\Repositories\Invoice\InvoiceRepository;

class InvoiceService {

    protected $invoiceRepository;

    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository;
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

    public function DataOrderGet(){
        try {
            $invoiceGet = $this->invoiceRepository->DataOrderGet();
            if($invoiceGet){
                return returnCustom('Data Tidak Ditemukan');
            }

            return $invoiceGet;
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

}
