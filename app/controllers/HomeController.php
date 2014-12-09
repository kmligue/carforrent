<?php

class HomeController extends BaseController {

	public function home()
	{
		$locations = Location::all();
		$cars = Car::all();

		return View::make('client.home')->with('locations', $locations)->with('cars', $cars);
	}

}
