<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class state extends Model
{
    protected $table = 'states';
    protected $fillable = ['name'];

    public function product(){
        return $this->hasMany(Product::class);
    }

}
