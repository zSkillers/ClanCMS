<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'bio',
        'photo',
        'type',
        'rsname',
        'title',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['remember_token', 'password'];

    public function threads()
    {
        return $this->hasMany('App\Thread');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function stathistorys()
    {
        return $this->hasMany('App\Stathistory');
    }

    public function stat()
    {
        return $this->hasOne('App\Stat');
    }

    public function shouts()
    {
        return $this->hasOne('App\shoutbox');
    }

    public function last_user_replys()
    {
        return $this->hasMany("App\Thread");
    }

    public function private_messages()
    {
        return $this->hasMany("App\PrivateMessage");
    }

    public function private_threads()
    {
        return $this->hasMany("App\PrivateThread");
    }
}
