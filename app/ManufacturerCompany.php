<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManufacturerCompany extends Model
{
    //
    protected $table = 'manufacturer_companies';
    public $timestamps = false;
 
    public $incrementing = false;

    protected $fillable = ['manufacturer_id', 'company_id'];
}
