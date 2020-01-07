<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'thread_id', 'body', 'carbon_post'];

    protected $appends = ['carbon_post'];

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCarbonPostAttribute()
    {
        return $this->attributes['carbon_post'] = Carbon::parse(
            $this->created_at
        )->diffForHumans();
    }
}
