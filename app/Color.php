<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table = 'colors';
    public $timestamps = false;
    protected $fillable = [
        'name', 
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_colors', 'product_id', 'color_id');
    }
    public function parts()
    {
        return $this->belongsToMany(Part::class, 'part_colors', 'color_id', 'part_id');
    
    }
}
