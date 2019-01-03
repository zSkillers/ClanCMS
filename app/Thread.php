<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id', 'title', 'user_id', 'forum_id'
  ];

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
