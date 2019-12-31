<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStat extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = 'product_id';

    protected $guarded = [];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
