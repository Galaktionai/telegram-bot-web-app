<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //use HasFactory;
    protected $table = 'orders';
    protected $guarded = false;

    // public function orderProduct()
    // {
    //     return $this->belongsTo(OrderProduct::class, 'order_products', 'id');
    // }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}
