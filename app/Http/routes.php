<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'guest'], function()
{

	Route::get('/', 'WelcomeController@index');

	// login
	Route::get('auth/login', function() {
		return View::make('auth/login');
	});
	Route::post('/auth/login', array('before' => 'csrf_json', 'uses' => 'Auth\AuthController@login'));

	// forgot password
	Route::get('auth/forgotpwd', 'Auth\PasswordController@index');
	Route::post('auth/forgotpwd', 'Auth\PasswordController@postRemind');
	Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('/password/reset', 'Auth\PasswordController@postReset');
});

// authenticate required
Route::group(['middleware' => 'auth'], function()
{
	Route::get('dashboard', 'DashboardController@index');
	Route::get('dashboard/user/all', 'UserController@allUser');
	Route::get('dashboard/user/add', 'UserController@addUser');
	Route::get('auth/logout', 'Auth\AuthController@logout');
});