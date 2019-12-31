<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Brand;
use App\Company;
class Manufacturer extends Model
{
    
    protected $table = 'manufacturers';
    protected $fillable = [
        'name','email', 
    ];
    public function product(){
        return $this->hasMany(Product::class ,'manfacturer_id' , 'id');
    }

    public function brand(){
        return $this->hasMany(Brand::class);
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'manufacturer_companies', 'manufacturer_id', 'company_id');
    }
}
