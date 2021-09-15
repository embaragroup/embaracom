<?php

namespace App\Models\PaketTrip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriTrip extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_trip', 'image'];

    public function PaketTrip(){
        return $this->hasMany(PaketTrip::class, 'kategori_trip_id', 'id');
    }
}
