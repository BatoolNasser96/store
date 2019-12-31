<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //
    protected $table = 'product_colors';
    public $timestamps = false;
 
    public $incrementing = false;

    protected $fillable = ['product_id', 'color_id'];
}
