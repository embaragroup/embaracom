<?php

namespace App\Repositories\PaketTrip;

use App\Models\PaketTrip\KategoriTrip;

class KategoriTripRepository {

    public function getDataKategoriTrip(){
        $dataKategori = KategoriTrip::all();

        return $dataKategori;
    }
}
