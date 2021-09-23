<?php

namespace App\Repositories\KategoriTrip;

use App\Models\PaketTrip\KategoriTrip;

class KategoriTripRepository {

    public function getKategori()
    {
        $dataAdmin = KategoriTrip::all();
        return $dataAdmin;
    }

    public function findById($id)
    {
        return KategoriTrip::find($id);
    }
}
