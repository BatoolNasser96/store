<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'countries';
    protected $fillable = [
        'name', 
    ];
    public function city(){
        return $this->hasMany(City::class, 'country_id','id');
   }
   public function company(){
    return $this->hasMany(Company::class, 'country_id','id');
}
   
}
