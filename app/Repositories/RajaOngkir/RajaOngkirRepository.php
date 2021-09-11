<?php

namespace App\Repositories\RajaOngkir;

use App\Models\RajaOngkir\Kota;
use App\Models\RajaOngkir\Provinsi;
use GuzzleHttp\Client;

class RajaOngkirRepository{

    public function getClient(){
        $client = new Client();

        return $client;
    }

    public function getDataProvinsi(){
        $dataProvinsi = Provinsi::with([]);

        return $dataProvinsi->get();
    }

    public function getDataKota($id){
        $dataKota = Kota::where('province_id', $id);

        return $dataKota->pluck('id','city');
    }
}
