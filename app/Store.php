<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    
    protected $fillable = [
        'name', 'address', 'phone_number', 'email','user_id',
           ];
    protected $table = 'stores';

}

