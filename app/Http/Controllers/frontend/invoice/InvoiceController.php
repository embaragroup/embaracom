<?php

namespace App\Http\Controllers\frontend\invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoice\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct()
    {
        $this->invoiceService = new InvoiceService;
    }

    public function getInvoice(){
        $invoiceFirst = $this->invoiceService->DataOrderFirst();
        $invoiceGet = $this->invoiceService->DataOrderGet();
        return view('frontend.pages.invoice.invoice', compact('invoiceFirst', 'invoiceGet'));
    }
}
