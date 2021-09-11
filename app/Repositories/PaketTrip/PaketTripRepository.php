<?php

namespace App\Repositories\PaketTrip;

use App\Models\PaketTrip\PaketTrip;

class PaketTripRepository{

    public function getAllPaketTrip($paginate)
    {
        $data = PaketTrip::with(['Provinsi', 'City', 'KategoriTrip']);
        if ($paginate > 0) {
            return $data->paginate($paginate);
        }
        return $data->get();
    }

    public function findById($id)
    {
        return PaketTrip::find($id);
    }
}
