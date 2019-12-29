<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    //check name relationship for the current user
    public function hasAnyRoles($roles){
        //if there's a match return the first role
        if($this->roles()->whereIn('roleName', $roles)->first()){
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        //passing string
        if ($this->roles()->where('roleName', $role)->first()) {
            return true;
        }
        return false;
    }

}
