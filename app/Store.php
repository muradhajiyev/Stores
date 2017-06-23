<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;
use App\Store_Image;

class Store extends Model
{
    
    protected $fillable = [
        'name', 'address', 'phone_number', 'description', 'slogan', 'email','user_id',
           ];
    protected $table = 'stores';

    //protected $appends = ['profile_url', 'cover_urls'];

    protected $appends = ['profile_url', 'image_urls'];


    public function profile_image(){
    	return $this->hasOne(Image::class, 'id', 'profile_image_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'store_image', 'store_id', 'image_id');
    }

    public function getProfileUrlAttribute()
    {
        return config('settings.base_url').config('settings.store_profile_base_path').$this->profile_image->path;

        //return config('settings.base_url').$this->profile_image->path; addition for testing locally
    }

    public function getImageUrlsAttribute()
    {

        foreach ($this->images as $image) {
            $image->path = config('settings.base_url') . config('settings.store_cover_base_path') . $image->path;
          //$image->path = config('settings.base_url') . $image->path; addition for testing locally
        }
        return $this->images;
    }

    public function products(){
        return $this->hasMany('App\Product')->latest();
    }
 public function  blogs(){
     return $this->hasMany('App\Blog');
 }
}

