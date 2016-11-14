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
    	return view('pages.admin', ['users' => $users]);
    }

    public function postRoles(Request $request){
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();

        if($request['role_user']){
            $user->roles()->attach(Role::where('name', 'User')->first());
        }

        if($request['role_super_admin']){
            $user->roles()->attach(Role::where('name', 'Super Admin')->first());
        }

        if($request['role_admin']){
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }

        return redirect()->back();

    }


    
}