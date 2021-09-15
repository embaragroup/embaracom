<?php

namespace App\Models\Invoice;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
