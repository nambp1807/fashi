<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = "orders_products";
    protected $fillable = ["order_id", 'product_id', 'qty', 'price'];
    public function Order()
    {
        return $this->belongsTo("\App\Order");
    }
}
