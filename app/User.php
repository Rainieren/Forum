<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role_id', 'user_about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //KOPPELEN VAN DATABASE

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function themes() {
        return $this->hasMany('App\Theme');
    }

    public function topics() {
        return $this->hasMany('App\Topic');
    }

    public function replies() {
        return $this->hasMany('App\Reply');
    }

    public function isAdmin()
    {
        if(Auth::check())
            return(Auth::user()->role_id == 2);

        return false;
    }

    public function isModerator()
    {
        if(Auth::check())
            return(Auth::user()->role_id == 3);

        return false;
    }
}
