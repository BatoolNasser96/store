<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perm extends Model
{
    //
    protected $table = 'perms';
     public $timestamps = false;
     protected $fillable = [
        'name', 
    ];
    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_perms', 'admin_id', 'perm');
    }
}
