<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::group(array('before' => 'guest'), function() {
	Route::get('admin', array('uses' => 'LoginController@showLogin'));
});

Route::group(array('before' => 'auth'), function() {
	Route::get('admin/dashboard', function() {
		return View::make('admin.dashboard');
	});

	Route::get('admin/car', array('uses' => 'CarController@car'));
	Route::get('admin/car/add', function() {
		return View::make('admin.carAdd');
	});

	Route::get('admin/booking', function() {
		return View::make('admin.booking');
	});

	Route::get('admin/logout', array('uses' => 'LoginController@doLogout'));
});

Route::group(array('before' => 'auth|csrf'), function() {
	Route::post('admin/car/add', array('uses' => 'CarController@addCar'));
});

Route::group(array('before' => 'csrf'), function() {
	Route::post('admin', array('uses' => 'LoginController@doLogin'));
});

