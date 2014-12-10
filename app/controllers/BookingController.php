<?php

class BookingController extends BaseController {

	public function booking() {
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
			Session::put('location', Input::get('location'));
			Session::put('pick-up-date', Input::get('pick-up-date'));
			Session::put('pick-up-time', Input::get('pick-up-time'));
			Session::put('return-date', Input::get('return-date'));
			Session::put('return-time', Input::get('return-time'));

			if(Input::has('diff-location')) {
				Session::put('return-loc', Input::get('return-loc'));
			}
			$locations = Location::all();

			$cars = Car::leftJoin('bookings', 'bookings.car_id', '=', 'cars.id')
					->orWhereNotBetween('bookings.pick_up_date', array(Input::get('pick-up-date'), Input::get('return-date')))
					->orWhereNotBetween('bookings.return_date', array(Input::get('pick-up-date'), Input::get('return-date')))
					->orWhereNotBetween('bookings.pick_up_time', array(Input::get('pick-up-time'), Input::get('return-time')))
					->orWhereNotBetween('bookings.return_time', array(Input::get('pick-up-time'), Input::get('return-time')))
					->where('bookings.status', '=', 'reserved')
					->get();

			return View::make('client.booking')->with('cars', $cars)->with('locations', $locations)->with('inputs', Input::all());
		}
	}

}