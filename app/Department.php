<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Part;
use App\Color;
use App\Size;
class Department extends Model
{
    //
    protected $table = 'departments';
    
    

    public function product(){
        return $this->hasMany(Product::class,'department_id' , 'id');
    }
    public function parts()
    {
        return $this->belongsToMany(Part::class, 'department_parts', 'department_id', 'part_id');
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'department_colors', 'department_id', 'color_id');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'department_sizes', 'department_id', 'size_id');
    }


}
