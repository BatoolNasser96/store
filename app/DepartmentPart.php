<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentPart extends Model
{
    //
    protected $table = 'department_parts';
    public $timestamps = false;
 
    public $incrementing = false;

    protected $fillable = ['department_id', 'part_id'];
}
