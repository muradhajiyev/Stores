<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function specifications(){
       return $this->hasMany('App\Specification');
    }
}
