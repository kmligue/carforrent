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

Route::group(array('before' => 'csrf'), function() {
	Route::post('reserve/{carId}/{slug}', array('uses' => 'BookingController@reserve'));
	Route::post('admin', array('uses' => 'LoginController@doLogin'));
	Route::post('contact', array('uses' => 'EmailController@contact'));
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

	Route::get('admin/booking/getReserveDetails/{id}', array('uses' => 'BookingController@getReserveDetails'));
	Route::get('admin/booking/reserve/{id}', array('uses' => 'BookingController@adminReserve'));
	Route::get('admin/booking/done/{id}', array('uses' => 'BookingController@adminDone'));
	Route::get('admin/booking/restore/{id}', array('uses' => 'BookingController@restoreBooking'));
	Route::get('admin/booking/archive', array('uses' => 'BookingController@showArchive'));
	Route::get('admin/booking/pending', array('uses' => 'BookingController@showPending'));
	Route::get('admin/booking/reserved', array('uses' => 'BookingController@showReserved'));
	Route::get('admin/booking/print/{id}/{token}', array('uses' => 'BookingController@printPage'));
	Route::get('admin/booking', array('uses' => 'BookingController@adminBooking'));

	Route::get('admin/messages', array('uses' => 'EmailController@messages'));
	Route::get('admin/messages/{id}', array('uses' => 'EmailController@getMessage'));
	Route::get('admin/messages/send/{id}', array('uses' => 'EmailController@sendForm'));

	Route::get('admin/create/user', array('uses' => 'AccountController@showCreateUser'));
	Route::get('admin/change/pass', array('uses' => 'AccountController@showChangePass'));

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

	Route::post('admin/message/{id}', array('uses' => 'EmailController@sendMessage'));

	Route::post('admin/create/user', array('uses' => 'AccountController@createUser'));
	Route::post('admin/change/pass', array('uses' => 'AccountController@changePass'));
});

Route::get('booking/print/{id}/{token}', array('uses' => 'BookingController@printPage'));
Route::post('cars', array('uses' => 'BookingController@cars'));
Route::get('booking/{carId}/{slug}', array('uses' => 'BookingController@booking'));
Route::get('cars', array('uses' => 'BookingController@getCars'));

// App::error(function(Exception $exception) {
// 	Log::error($exception);

// 	return Redirect::to('/');
// });

