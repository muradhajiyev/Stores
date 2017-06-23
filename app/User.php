<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
       return $this->belongsTo('App\Role');
    }
    public function isStore(){
        if($this->role->name=='store'){
            return true;
        }
        return false;
    }
    public function isAdmin(){
        if($this->role->name=='admin'){
            return true;
        }
        return false;
    }
    public function isUser(){
        if($this->role->name=='user'){
            return true;
        }
        return false;
    }
    public function isStoreOwner($id){
        $store=Store::find($id);
        if($store&&($this->id===$store->user_id)){
            return true;
        }
        return false;
    }
    public function  comments(){
        return $this->hasMany('App\Comment','created_by','id');
    }
}
