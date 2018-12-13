<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function thread()
  {
    $this->belongsTo('App\Thread');
  }

  public function user()
  {
    $this->belongsTo('App\User');
  }
}
