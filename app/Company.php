<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User ;
use App\Manufacturer;

class Company extends Authenticatable
{
    //
    protected $table = 'companies';
        use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    
    public function product(){
        return $this->hasMany(Product::class);
    }

    public function cities(){
        return $this->belongsTo(City::class, 'city_id','id');
    }

    public function countries(){
        return $this->belongsTo(Country::class, 'country_id','id');
    }
    public function suppliers(){
        return $this->hasMany(Supplier::class, 'company_id','id');
    }
    public function manufacturers()
    {
        return $this->belongsToMany(Manufacturer::class, 'manufacturer_companies', 'company_id' , 'manufacturer_id');
    }
 
}



