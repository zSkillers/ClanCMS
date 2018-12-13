<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
  public function forum()
  {
    return $this->belongsTo('App\Forum');
  }

  public function threads()
  {
    return $this->hasMany('App\Post');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
