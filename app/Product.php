<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User ;
use App\Company;
use App\Department;
use App\Manufacturer;
use App\State;
use App\Color;
use App\Size;
use App\Part;
use App\Brand;

class Product extends Authenticatable
{
       use Notifiable;
       protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
    ];
    
  
     public function companies()
    {
        return $this->belongsTo(Company::class,'company_id' , 'id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id' , 'id');
    }
    public function parts()
    {
        return $this->belongsTo(Part::class,'part_id' , 'id');
    }

    public function states()
    {
        return $this->belongsTo(State::class,'state_id' , 'id');
    }

    public function manufacturers()
    {
        return $this->belongsTo(Manufacturer::class,'manfacturer_id' , 'id');
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class,'brand_id' , 'id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id');
    }

    public function comments()
    {
    return $this->hasMany('App\Comment');
    }
    public function likes()
    {
    return $this->hasMany('App\Like');
    }

    public function stat(){
        return $this->hasOne(ProductStat::class)->withDefault();
    }
  
}
