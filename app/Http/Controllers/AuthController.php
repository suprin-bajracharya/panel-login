<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AuthenticatesUsers;
use App\Http\Requests;
use App\User;
use Auth;
use Session;
use App\Role;

class AuthController extends Controller
{
    public function getSignUpPage(){
    	return view('auth.create');
    }

    public function getSignInPage(){
    	return view('auth.login');
    }

    public function postSignUp(Request $request){
    	$user = new User();

    	$user->name = $request['name'];
    	$user->email = $request['email'];
    	$user->password = bcrypt($request['password']);

    	$user->save();
        $user->roles()->attach(Role::where('name', 'User')->first());
    	return redirect()->route('welcome');
    }

    public function postSignIn(Request $request){
    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
    		return redirect()->route('welcome');
    		
    	}else{
    		Session::flash('Error', 'Username or password incorrect');
            return view('auth.login');
    	}
    	
    	
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('welcome');
    }

}
