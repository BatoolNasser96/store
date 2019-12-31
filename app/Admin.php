<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User ;


class Admin extends Authenticatable
{
    //
    protected $table = 'admins';
        use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
      public function hasPerm($perm)
    {
        return AdminPerm::where('admin_id', $this->id)->where('perm', $perm)->count();
    }

  
    public function perms()
    {
        return $this->belongsToMany(Perm::class, 'admin_perms', 'admin_id', 'perm');
    }
    public function isSuperAdmin()
    {
        return true;
    }
}
