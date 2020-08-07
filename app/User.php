<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function likes()
    {
      return $this->hasMany('App\Like');
    }
    
    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }

}
