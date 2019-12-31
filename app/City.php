<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'cities';

   
   public function countries(){
    return $this->belongsTo(Country::class, 'country_id','id');
}

public function company(){
    return $this->hasMany(Company::class, 'city_id','id');
}
}
