<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stathistory extends Model
{
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
