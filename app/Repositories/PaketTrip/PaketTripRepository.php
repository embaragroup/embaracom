<?php

namespace App\Repositories\PaketTrip;

use App\Models\PaketTrip\PaketTrip;
use Illuminate\Support\Facades\Auth;
class PaketTripRepository{

    public function getAllPaketTrip($paginate)
    {
        $data = PaketTrip::where('agent_id', Auth::user()->id)->with(['Provinsi', 'City', 'KategoriTrip']);
        if ($paginate > 0) {
            return $data->paginate($paginate);
        }
        return $data->get();
    }

    public function findById($id)
    {
        return PaketTrip::find($id);
    }

    public function paketTripFindByKategoriTripId($id)
    {
        return PaketTrip::with(['KategoriTrip'])->where('kategori_trip_id', $id)->get();
    }
}
