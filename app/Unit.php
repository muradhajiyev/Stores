<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function specifications(){
        $this->hasMany('App\Specification');
    }
}
