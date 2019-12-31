<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    //
    protected $table = 'parts';
    protected $fillable = [
        'name', 
    ];
    public function product(){
        return $this->hasMany(Product::class,'department_id' , 'id');
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_parts', 'part_id', 'department_id');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class ,'part_sizes', 'part_id', 'size_id');
    }
    
    public function colors()
    {
        return $this->belongsToMany(Color::class,'part_colors', 'part_id', 'color_id');
    }
}
