<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primariKey ="id";

    protected $fillable = [
       'id', 'email', 'password', 'userFirstName', 'userLastName','userAddress', 'userPhoneNumber', 'userIdentificationNumber', 'userHerbaLifeCode', 'user_create', 'city_id', 'status_id', 'user_type_id'
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

    public function hasAnyRole($role){
        return null !== $this->roles()->where('roleName', $role)->first();
    }
}
