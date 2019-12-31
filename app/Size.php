<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    protected $table = 'sizes';
    protected $fillable = [
        'name', 
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sizes', 'product_id', 'size_id');
    }
    public function parts()
    {
        return $this->belongsToMany(Part::class, 'part_sizes', 'size_id', 'part_id');
    
    }
    
}
