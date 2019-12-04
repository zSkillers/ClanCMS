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
        'name', 'email', 'bio', 'photo','type', 'rsname', 'title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
     'remember_token',
    ];

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
}
