<?php

namespace App\Http\Controllers\backend\kategoriTrip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\KategoriTrip\KategoriTripService;


class kategoriTripController extends Controller
{
    protected $kategoriService;

    public function __construct()
    {
        $this->kategoriService = new KategoriTripService;
    }

    public function index()
    {
        $kategoriTrip = $this->kategoriService->getDataKategori();
        return view('backend.admin-embara.pages.kategori-trip.index', compact('kategoriTrip'));
    }

    public function createKategori($id = null)
    {
        $dataKategoriTrip = $this->kategoriService->getDataKategori();

        if ($id) {
            $result = $this->kategoriService->findById($id);
            return view('backend.admin-embara.pages.kategori-trip.create', compact('dataKategoriTrip', 'result'));
        }

        return view('backend.admin-embara.pages.kategori-trip.create');
    }

    public function storeKategori(Request $request, $id = null)
    {
        $result = $this->kategoriService->storeKategori($request, $id);
        alertNotify($result['status'], $result['message'], $request);
        return redirect(url('/admin-embara/pageKategori'));
    }

    public function deleteKategori(Request $request, $id)
    {
        $result = $this->kategoriService->delete($id);
        alertNotify($result['status'], $result['message'], $request);
        return redirect()->back();
    }
}
