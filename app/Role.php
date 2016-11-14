<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Permission;

class Role extends Model
{
    //
    public function users(){
    	return $this->belongsToMany('App\User');
    }

    public function permissions(){
    	return $this->belongsToMany('App\Permission');	
    }

    public function assign(Permission $permission){
    	return $this->permissions()->save($permission);
    }
}
