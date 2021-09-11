<?php

namespace App\Models\RajaOngkir;

use App\Models\PaketTrip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $fillable = ['province_id', 'city'];

    public function Provinsi(){
        return $this->belongsTo(Provinsi::class, 'province_id', 'id');
    }

    public function PaketTrip(){
        return $this->hasMany(PaketTrip::class, 'city_id', 'id');
    }
}
