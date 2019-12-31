<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartSize extends Model
{
    //
    protected $table = 'part_sizes';
    public $timestamps = false;
 
    public $incrementing = false;

    protected $fillable = ['part_id', 'size_id'];
}
