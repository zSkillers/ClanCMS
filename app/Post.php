<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'thread_id', 'body'
  ];

  public function thread()
  {
    return $this->belongsTo('App\Thread');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
