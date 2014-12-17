<?php

class BookingController extends BaseController {

	public function adminBooking() {
		$bookings = Booking::join('cars', 'cars.id', '=', 'bookings.car_id')
							->orderBy('bookings.created_at', 'desc')
							->select('bookings.id as id', 'bookings.fname as fname', 'bookings.lname as lname', 'bookings.email as email', 'bookings.credit_card_no as credit_card_no', 'bookings.cc_expire_date as cc_expire_date', 'bookings.cc_code as cc_code', 'bookings.location_id as location_id', 'bookings.return_location as return_location', 'bookings.pick_up_date as pick_up_date', 'bookings.pick_up_time as pick_up_time', 'bookings.return_date as return_date', 'bookings.return_time as return_time', 'bookings.status as status', 'cars.name as name')
							->paginate(10);
		$locations = Location::all();

		return View::make('admin.booking')->with('bookings', $bookings)->with('locations', $locations);
	}

	public function adminReserve($id) {
		$booking = Booking::findOrFail($id);
		$booking->status = 'Reserved';

		if($booking->save()) {
			return Redirect::back();
		}
		else {
			return Redirect::back()->with('error', 'Something went wrong!');
		}
	}

	public function adminDone($id) {
		try {
			$booking = Booking::findOrFail($id);
			$booking->delete();

			return Redirect::back();
		} catch (Exception $e) {
			return Redirect::back()->with('error', $e.getMessage());
		}
	}

	public function showArchive() {
		$bookings = Booking::onlyTrashed()
					->paginate(10);

		$locations = Location::all();

		return View::make('admin.bookingArchive')->with('bookings', $bookings)->with('locations', $locations);
	}

	public function showPending() {
		$bookings = Booking::where('status', '=', 'Pending')
							->paginate(10);

		$locations = Location::all();

		return View::make('admin.booking')->with('bookings', $bookings)->with('locations', $locations);
	}

	public function showReserved() {
		$bookings = Booking::where('status', '=', 'Reserved')
							->paginate(10);

		$locations = Location::all();

		return View::make('admin.booking')->with('bookings', $bookings)->with('locations', $locations);
	}

	public function restoreBooking($id) {
		try {
			$booking = Booking::withTrashed()->where('id', '=', $id)->restore();

			return Redirect::back()->with('success', 'Successfully restored!');
		} catch (Exception $e) {
			return Redirect::back()->with('error', $e->getMessage());
		}
	}

	public function getReserveDetails($id) {
		$booking = Booking::where('bookings.id', '=', $id)
							->join('cars', 'cars.id', '=', 'bookings.car_id')
							->select('bookings.id as id', 'bookings.fname as fname', 'bookings.lname as lname', 'bookings.email as email', 'bookings.credit_card_no as credit_card_no', 'bookings.cc_expire_date as cc_expire_date', 'bookings.cc_code as cc_code', 'bookings.location_id as location_id', 'bookings.return_location as return_location', 'bookings.pick_up_date as pick_up_date', 'bookings.pick_up_time as pick_up_time', 'bookings.return_date as return_date', 'bookings.return_time as return_time', 'bookings.status as status', 'cars.name as name')
							->get();

		$locations = Location::all();

		foreach ($locations as $key => $value) {
			if($booking[0]['location_id'] == $value['id']) {
				$booking[0]['pick_up_loc'] = $value['address'];
			}

			if($booking[0]['return_location'] == $value['id']) {
				$booking[0]['return_loc'] = $value['address'];
			}
		}

		return $booking;
	}

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
			Session::forget('location');
			Session::forget('pick-up-date');
			Session::forget('pick-up-time');
			Session::forget('return-date');
			Session::forget('return-time');

			if(Input::has('diff-location')) {
				Session::forget('return-loc');
				Session::forget('diff-location');
			}

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

			$pickUpDateFormat = new DateTime(Input::get('pick-up-date') . ' ' . Input::get('pick-up-time'));
			$returnDateFormat = new DateTime(Input::get('return-date') . ' ' . Input::get('return-time'));

			$cars = Car::all();
			$bookings = Booking::where('status', '=', 'Reserved')
								->get();

			return View::make('client.choose_car')->with('cars', $cars)->with('locations', $locations)->with('inputs', Input::all())->with('bookings', $bookings);
		}
	}

	public function getCars() {
		if(Session::has('location') && Session::has('pick-up-date') && Session::has('pick-up-time') && Session::has('return-date') && Session::has('return-time')) {

			$locations = Location::all();

			$pickUpDateFormat = new DateTime(Input::get('pick-up-date') . ' ' . Input::get('pick-up-time'));
			$returnDateFormat = new DateTime(Input::get('return-date') . ' ' . Input::get('return-time'));

			$cars = Car::all();
			$bookings = Booking::where('status', '=', 'Reserved')
								->get();

			return View::make('client.choose_car')->with('locations', $locations)->with('cars', $cars)->with('bookings', $bookings);

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

	public function reserve($carId, $slug) {
		$rules = array(
			'fname' => 'required',
			'lname' => 'required',
			'email' => 'required|email',
			'credit-card' => 'required',
			'exp-date' => 'required',
			'code' => 'required'
		);

		$messages = array(
			'fname.required' => 'First Name field is required.',
			'lname.required' => 'Last Name field is required.',
			'email.required' => 'Email Address field is required.',
			'email.email' => 'Invalid email address.',
			'credit-card.required' => 'Credit Card field is required.',
			'exp-date.required' => 'Expiration Date field is required.',
			'code.required' => 'Code field is required.'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}
		else {
			$booking = new Booking;
			$booking->car_id = $carId;
			$booking->fname = Input::get('fname');
			$booking->lname = Input::get('lname');
			$booking->email = Input::get('email');
			$booking->credit_card_no = Input::get('credit-card');
			$booking->cc_expire_date = Input::get('exp-date');
			$booking->cc_code = Input::get('code');
			$booking->location_id = Session::get('location');

			if(Session::has('diff-location')) {
				$booking->return_location = Session::get('return-loc');
			}
			else {
				$booking->return_location = Session::get('location');
			}

			$booking->pick_up_date = new DateTime(Session::get('pick-up-date') . ' ' . Session::get('pick-up-time'));
			$booking->pick_up_time = Session::get('pick-up-time');
			$booking->return_date = new DateTime(Session::get('return-date') . ' ' . Session::get('return-time'));
			$booking->return_time = Session::get('return-time');
			$booking->status = 'Pending';

			if($booking->save()) {
				Session::forget('location');
				Session::forget('pick-up-date');
				Session::forget('pick-up-time');
				Session::forget('return-date');
				Session::forget('return-time');

				if(Input::has('diff-location')) {
					Session::forget('return-loc');
					Session::forget('diff-location');
				}

				$b = Booking::join('cars', 'cars.id', '=', 'bookings.car_id')
							->where('bookings.id', '=', $booking->id)
							->select('bookings.fname as fname', 'bookings.car_id', 'bookings.lname as lname', 'bookings.email as email', 'bookings.credit_card_no as credit_card_no', 'bookings.cc_expire_date as cc_expire_date', 'bookings.cc_code as cc_code', 'bookings.pick_up_date as pick_up_date', 'bookings.pick_up_time as pick_up_time', 'bookings.return_date as return_date', 'bookings.return_time as return_time', 'bookings.location_id as location_id', 'bookings.return_location as return_location', 'cars.name as name', 'cars.image as image', 'cars.rate as rate')
							->first();

				$locations = Location::all();
				
				return View::make('client.success_booking')->with('booking', $b)->with('carId', $carId)->with('slug', $slug)->with('locations', $locations);
			}
			else {
				return Redirect::back()->with('error', 'Something went wrong!');
			}
		}
	}

	public function printPage($id) {
		$booking = Booking::where('bookings.id', '=', $id)
						->join('cars', 'cars.id', '=', 'bookings.car_id')
						->get();

		$locations = Location::all();

		return View::make('admin.bookingPrintPage')->with('booking', $booking)->with('locations', $locations);
	}

}