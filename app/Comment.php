<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Presenters\DatePresenter; 

class Comment extends Model
{
      use DatePresenter;
      protected $table="comment";
      // fields can be filled
      protected $fillable = ['comment', 'user_id', 'product_id'];
     
      public function product()
      {
        return $this->belongsTo('App\Product');
      }
     
      public function user()
      {
        return $this->belongsTo('App\User');
      }
}
