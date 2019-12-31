<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartColor extends Model
{
    //
    protected $table = 'part_colors';
    public $timestamps = false;
 
    public $incrementing = false;

    protected $fillable = ['part_id', 'color_id'];
}
