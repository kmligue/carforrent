<?php

class BookingController extends BaseController {

	public function cars() {
		$rules = array(
			'location' => 'required',
			'pick-up-date' => 'required',
			'pick-up-time' => 'required',
			'return-date' => 'required',
			'return-time' => 'required',
			'return-loc' => 'required_if:diff-location,on'
		);
		
		$messages = array(
			'location.required' => 'Location field is required.',
			'pick-up-date.required' => 'Pick Up Date field is required.',
			'pick-up-time.required' => 'Pick Up Time field is required',
			'return-date.required' => 'Return Date field is required',
			'return-time.required' => 'Return Time field is required',
			'return-loc.required_if' => 'Return Location field is required.'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->fails()) {
			return Redirect::to('/')->withErrors($validator)->withInput(Input::all());
		}
		else {
			Session::flush();

			Session::put('location', Input::get('location'));
			Session::put('pick-up-date', Input::get('pick-up-date'));
			Session::put('pick-up-time', Input::get('pick-up-time'));
			Session::put('return-date', Input::get('return-date'));
			Session::put('return-time', Input::get('return-time'));

			if(Input::has('diff-location')) {
				Session::put('diff-location', Input::get('diff-location'));
				Session::put('return-loc', Input::get('return-loc'));
			}
			$locations = Location::all();

			$cars = Car::leftJoin('bookings', 'bookings.car_id', '=', 'cars.id')
					->orWhereNotBetween('bookings.pick_up_date', array(Input::get('pick-up-date'), Input::get('return-date')))
					->orWhereNotBetween('bookings.return_date', array(Input::get('pick-up-date'), Input::get('return-date')))
					->orWhereNotBetween('bookings.pick_up_time', array(Input::get('pick-up-time'), Input::get('return-time')))
					->orWhereNotBetween('bookings.return_time', array(Input::get('pick-up-time'), Input::get('return-time')))
					->where('bookings.status', '=', 'reserved')
					->select('cars.id as id', 'cars.name as name', 'cars.slug as slug', 'cars.transmission as transmission', 'cars.style as style', 'cars.seating as seating', 'cars.rate as rate', 'cars.image as image')
					->get();

			return View::make('client.choose_car')->with('cars', $cars)->with('locations', $locations)->with('inputs', Input::all());
		}
	}

	public function getCars() {
		if(Session::has('location') && Session::has('pick-up-date') && Session::has('pick-up-time') && Session::has('return-date') && Session::has('return-time')) {

			$locations = Location::all();

			$cars = Car::leftJoin('bookings', 'bookings.car_id', '=', 'cars.id')
					->orWhereNotBetween('bookings.pick_up_date', array(Input::get('pick-up-date'), Input::get('return-date')))
					->orWhereNotBetween('bookings.return_date', array(Input::get('pick-up-date'), Input::get('return-date')))
					->orWhereNotBetween('bookings.pick_up_time', array(Input::get('pick-up-time'), Input::get('return-time')))
					->orWhereNotBetween('bookings.return_time', array(Input::get('pick-up-time'), Input::get('return-time')))
					->where('bookings.status', '=', 'reserved')
					->select('cars.id as id', 'cars.name as name', 'cars.slug as slug', 'cars.transmission as transmission', 'cars.style as style', 'cars.seating as seating', 'cars.rate as rate', 'cars.image as image')
					->get();

			return View::make('client.choose_car')->with('locations', $locations)->with('cars', $cars);

		}
		else {
			return Redirect::to('/')->with('error', 'Something went wrong!');
		}
	}

	public function booking($carId, $slug) {
		if(Session::has('location') && Session::has('pick-up-date') && Session::has('pick-up-time') && Session::has('return-date') && Session::has('return-time')) {

			$locations = Location::all();
			$pickUpLoc = Location::findOrFail(Session::get('location'));

			if(Session::has('diff-location')) {
				$returnLoc = Location::findOrFail(Session::get('return-loc'));
			}

			$car = Car::findOrFail($carId);

			if(Session::has('diff-location')) {
				return View::make('client.booking')->with('locations', $locations)->with('car', $car)->with('pickUpLoc', $pickUpLoc)->with('returnLoc', $returnLoc);
			}
			else {
				return View::make('client.booking')->with('locations', $locations)->with('car', $car)->with('pickUpLoc', $pickUpLoc);
			}

		}
		else {
			return Redirect::to('/')->with('error', 'Something went wrong!');
		}
	}

}