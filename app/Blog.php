<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function store()
    {
        return $this->belongsTo('App\Store');
    }
    public function  comments()
    {
        return $this->hasMany('App\Comment');
    }
}
