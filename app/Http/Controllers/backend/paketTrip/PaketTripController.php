<?php

namespace App\Http\Controllers\backend\paketTrip;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaketTripRequest;
use App\Services\PaketTrip\PaketTripService;
use Illuminate\Http\Request;

class PaketTripController extends Controller
{
    protected $paketTripService;

    public function __construct()
    {
        $this->paketTripService = new PaketTripService;
    }

    public function index()
    {
        $products = $this->paketTripService->getAllPaketTrip(10);
        return view('backend.agent.pages.paketTrip.index', compact('products'));
    }

    public function formCreate($id = null)
    {
        $dataProvinsi = $this->paketTripService->getDataProvinsi();
        $dataKategori = $this->paketTripService->getDataKategoriTrip();

        if ($id) {
            $products = $this->paketTripService->findById($id);
            return view('backend.agent.pages.paketTrip.form-create', compact('products','dataProvinsi','dataKategori'));
        }
        return view('backend.agent.pages.paketTrip.form-create', compact('dataProvinsi','dataKategori'));
    }

    public function getDataKota($id){
        $dataKota = $this->paketTripService->getDataKota($id);
        return json_encode($dataKota);
    }

    public function saveAndEdit(PaketTripRequest $request, $id = null)
    {
        $products = $this->paketTripService->saveAndEdit($request, $id);
        alertNotify($products['status'], $products['message'], $request);
        return redirect('admin/pakettrip');
    }

    public function delete(Request $request, $id = null)
    {
        $products = $this->paketTripService->delete($id);
        alertNotify($products['status'], $products['message'], $request);
        return redirect('admin/pakettrip');
    }
}
