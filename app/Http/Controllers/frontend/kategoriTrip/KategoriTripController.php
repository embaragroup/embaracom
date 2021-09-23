<?php

namespace App\Http\Controllers\frontend\kategoriTrip;

use App\Http\Controllers\Controller;
use App\Repositories\KategoriTrip\KategoriTripRepository;
use App\Repositories\PaketTrip\PaketTripRepository;
use Illuminate\Http\Request;

class KategoriTripController extends Controller
{
    protected $kategoryTripRepo, $paketTripRepo;

    public function __construct()
    {
        $this->kategoryTripRepo = new KategoriTripRepository();
        $this->paketTripRepo = new PaketTripRepository();
    }
    public function index()
    {
        $kategoriTrip = $this->kategoryTripRepo->getKategori();
        return view('frontend.pages.kategori-trip.index', compact('kategoriTrip'));
    }

    public function destinasi(Request $request, $id)
    {
        $paketTrip = $this->paketTripRepo->paketTripFindByKategoriTripId($id);
        // if (count($paketTrip) == 0) {
        //     alertNotify(false, "Destinasi belum tersedia!", $request);
        // }
        return view('frontend.pages.kategori-trip.kategori-destinasi-trip', compact('paketTrip'));
    }
}
