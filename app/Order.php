<?php

namespace App;
use App\OrderProduct;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class,'order_id' , 'id');
    }
}
