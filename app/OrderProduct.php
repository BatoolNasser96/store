<?php

namespace App;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $table = 'orders_products';
    public function Order(){
        return $this->belongsTo(Order::class,'order_id' , 'id');
    }
}
