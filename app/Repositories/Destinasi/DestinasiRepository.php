<?php

namespace App\Repositories\Destinasi;

use App\Models\PaketTrip\PaketTrip;

class DestinasiRepository{

    public function getDestinasi($paginate){

        $data = PaketTrip::with([]);

        if($paginate > 0) {
            return $data->paginate($paginate);
        }

        return $data->get();
    }


    public function findById($id){
        return PaketTrip::findOrFail($id);
    }
}
