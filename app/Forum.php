<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'category_id'
  ];
    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function threads()
    {
      return $this->hasMany('App\Thread');
    }
}
