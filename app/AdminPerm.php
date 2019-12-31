<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPerm extends Model
{
    //
    protected $table = 'admin_perms';

    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = ['admin_id', 'perm'];
}
