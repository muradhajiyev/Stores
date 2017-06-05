<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function specifications(){
        $this->hasMany('App\Specification');
    }
}
