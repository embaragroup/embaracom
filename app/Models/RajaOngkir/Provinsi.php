<?php

namespace App\Models\RajaOngkir;

use App\Models\PaketTrip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['province'];

    public function Kota(){
        return $this->hasMany(Kota::class, 'province_id', 'id');
    }

    public function PaketTrip(){
        return $this->hasMany(PaketTrip::class, 'province_id', 'id');
    }
}
