<?php

namespace App\Http\Controllers\backend\rajaOngkir;

use App\Http\Controllers\Controller;
use App\Models\RajaOngkir\Kota;
use App\Models\RajaOngkir\Provinsi;
use App\Services\RajaOngkir\RajaOngkirService;
use Illuminate\Http\Request;

class RajaOngkirController extends Controller
{
    protected $rajaOngkirService;

    public function __construct()
    {
        $this->rajaOngkirService = new RajaOngkirService;
    }

    public function indexProvinsi(){
        $dataProvinsi = Provinsi::all();
        return view('backend.adminBackend.pages.provinsi.index', compact('dataProvinsi'));
    }

    public function indexKota(){
        $dataKota = Kota::all();
        return view('backend.adminBackend.pages.kota.index', compact('dataKota'));
    }

    public function getDataProvinsi(){
        $this->rajaOngkirService->getDataProvinsi();
        return redirect('/admin-embara/provinsi');
    }

    public function getDataKota(){
        $this->rajaOngkirService->getDataKota();
        return redirect('/admin-embara/kota');
    }
}
