<?php

namespace App\Models\Order;

use App\Models\Invoice\Invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Invoice(){
        return $this->hasMany(Invoice::class, 'order_id', 'id');
    }
}
