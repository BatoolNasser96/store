<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Manufacturer;
class Brand extends Model
{
    protected $table = 'brands';
   
    protected $fillable = [
        'name','img','manufacturer_id', 
    ];
    
    public function product(){
        return $this->hasMany(Product::class ,'brand_id' , 'id');
    }
     public function manufacturers()
    {
        return $this->belongsTo(Manufacturer::class,'manufacturer_id' , 'id');
    }
}
