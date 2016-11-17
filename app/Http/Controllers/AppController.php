<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;

class AppController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    //
    public function getIndex(){
 	   	return view('pages.admin');
    }

    public function getAdmin(){
    	$users = User::all();
        $roles = Role::all();


    	return view('pages.admin')->withUsers($users)->withRoles($roles);
    }

//    public function postRoles(Request $request){
//        $user = User::where('email', $request['email']);
//        $role = Role::where('name', $request['name']);
//        if($user->hasRole($role)){
//            $user->roles()->detach();
//        }
//
//        if($request[$role]){
//            $user->roles()->attach(Role::where('name', $role));
//        }
//
//        // if($request['role_super_admin']){
//        //     $user->roles()->attach(Role::where('name', 'Super Admin'));
//        // }
//
//        // if($request['role_admin']){
//        //     $user->roles()->attach(Role::where('name', 'Admin'));
//        // }
//
//        return redirect()->back();
//
//    }


    
}