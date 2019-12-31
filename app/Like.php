<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Like extends Model
{
    //
    
     use DatePresenter;
     protected $table="like";
  // fields can be filled
  protected $fillable = ['email', 'user_id', 'product_id'];
 
  public function product()
  {
    return $this->belongsTo('App\Product');
  }
 
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
