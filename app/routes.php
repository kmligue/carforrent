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

Route::get('/', array('uses' => 'HomeController@home'));

Route::group(array('before' => 'guest'), function() {
	Route::get('admin', array('uses' => 'LoginController@showLogin'));
});

Route::group(array('before' => 'auth'), function() {
	Route::get('admin/dashboard', function() {
		return View::make('admin.dashboard');
	});

	Route::get('admin/car', array('uses' => 'CarController@car'));
	Route::get('admin/car/archive', array('uses' => 'CarController@showArchive'));
	Route::get('admin/car/{id}/edit', array('uses' => 'CarController@showCar'));
	Route::get('admin/car/add', function() {
		return View::make('admin.carAdd');
	});

	Route::get('admin/location', array('uses' => 'LocationController@location'));
	Route::get('admin/location/archive', array('uses' => 'LocationController@showArchive'));
	Route::get('admin/location/{id}/edit', array('uses' => 'LocationController@showLocation'));
	Route::get('admin/location/add', function() {
		return View::make('admin.locationAdd');
	});

	Route::get('admin/booking', function() {
		return View::make('admin.booking');
	});

	Route::get('admin/logout', array('uses' => 'LoginController@doLogout'));
});

Route::group(array('before' => 'auth|csrf'), function() {
	Route::post('admin/car/add', array('uses' => 'CarController@addCar'));
	Route::post('admin/car/{id}/edit', array('uses' => 'CarController@editCar'));
	Route::delete('admin/car/{id}/archive', array('uses' => 'CarController@archiveCar'));
	Route::put('admin/car/{id}/restore', array('uses' => 'CarController@restoreCar'));

	Route::post('admin/location/add', array('uses' => 'LocationController@addLocation'));
	Route::post('admin/location/{id}/edit', array('uses' => 'LocationController@editLocation'));
	Route::delete('admin/location/{id}/archive', array('uses' => 'LocationController@archiveLocation'));
	Route::put('admin/location/{id}/restore', array('uses' => 'LocationController@restoreLocation'));
});

Route::group(array('before' => 'csrf'), function() {
	Route::post('admin', array('uses' => 'LoginController@doLogin'));
	Route::post('cars', array('uses' => 'BookingController@cars'));
});

Route::get('booking/{carId}/{slug}', array('uses' => 'BookingController@booking'));
Route::get('cars', array('uses' => 'BookingController@getCars'));

