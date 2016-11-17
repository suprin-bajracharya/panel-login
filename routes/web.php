<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Mail\Welcome;

//Register Routes
Route::get('/register', ['uses'=>'AuthController@getSignUpPage', 'as'=> 'register']);
Route::post('/register', ['uses'=>'AuthController@postSignUp', 'as'=> 'register']);

//Authetication Routes
Route::get('/login', ['uses'=>'AuthController@getSignInPage', 'as'=> 'login']);
Route::post('/login', ['uses'=>'AuthController@postSignIn', 'as'=> 'login']);

Route::get('/logout', ['uses'=>'AuthController@getLogout', 'as'=> 'logout']);

//Pages Route
Route::get('/', 'PagesController@index')->name('welcome');

Route::get('/admin', 'AppController@getAdmin')->name('users');

Route::resource('posts', 'PostsController');
//Roles Routes
Route::post('/admin/assign-roles', ['uses'=> 'AppController@postRoles', 'as'=>'admin.assign']);

Route::resource('roles', 'RoleController');
//Permission Controller
Route::resource('permissions', 'PermissionController');

// Route::get('/mail', function(){
// 	Mail::to('a@b.com')->send(new Welcome);
// });








