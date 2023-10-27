<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'clinic_id',
        'telephone'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function clinics()
    {
        return $this->hasOne('App\Clinic');
    }

    public function roles()
    {
        return $this->hasOne('App\Role');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }
}
