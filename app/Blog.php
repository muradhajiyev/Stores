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
    public function image()
    {
        return $this->hasOne('App\Image', 'id', 'image_id');
    }

    public function getImageUrlAttribute()
    {
        return config('settings.base_url') . config('settings.blog_base_path') . $this->image->path;
    }
}
