<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Post;
//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    public function roles(){
    	return $this->belongsToMany('App\Role');
    }

    public function posts(){
    	return $this->hasMany('App\Post');
    }

    public function owns($related){
        return $this->id == $related->user_id;
    }

    // public function hasAnyRole($roles){
    // 	if(is_array($roles)){
    // 		foreach($roles as $role){
    // 			if($this->hasRole($role)){
    // 				return true;
    // 			}
    // 		}
    // 	}else{
    // 		if($this->hasRole($roles)){
    // 			return true;
    // 		}
    // 	}
    // 	return false;
    // }

    public function hasRole($role){
    	if(is_string($role)){
    		return $this->roles->contains('name', $role);
    	}

        //return !! $role->intersect($this->roles)->count();
    }

    public function assign($role){
        if(is_string($role)){
            $this->roles()->save(
                Role::whereName($role)->firstorFail($id)
            );
        }

        return $this->roles()->save($role);
    }

}
