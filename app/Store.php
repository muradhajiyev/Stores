<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    
    protected $fillable = [
        'name', 'address', 'phone_number', 'description', 'slogan', 'email','user_id',
           ];
    protected $table = 'stores';

    protected $appends = ['profile_url'];


    public function profile_image(){
    	return $this->hasOne(Image::class, 'id', 'profile_image_id');
    }

    public function getProfileUrlAttribute()
    {

        return config('settings.base_image_url').config('settings.store_profile_base_path').$this->profile_image->path;
    }

}

