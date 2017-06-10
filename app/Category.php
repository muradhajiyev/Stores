<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public $fillable = ['name','parent_id'];

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function childs() {
        return $this->hasMany('App\Category','parent_id','id') ;
    }
    public function specifications(){
        return $this->belongsToMany('App\Specification', 'category__specifications', 'categ_id', 'spec_id');
    }
}
