<?php

namespace App\Models\PaketTrip;

use App\Models\PaketTrip\KategoriTrip;
use App\Models\RajaOngkir\Kota;
use App\Models\RajaOngkir\Provinsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketTrip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Provinsi(){
        return $this->belongsTo(Provinsi::class, 'province_id', 'id');
    }

    public function City(){
        return $this->belongsTo(Kota::class, 'city_id', 'id');
    }

    public function KategoriTrip(){
        return $this->belongsTo(KategoriTrip::class, 'kategori_trip_id', 'id');
    }
}
