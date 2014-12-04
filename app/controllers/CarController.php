<?php

class CarController extends BaseController {

	public function car() {
		$cars = Car::paginate(2);

		return View::make('admin.car')->with('cars', $cars);
	}

	public function addCar() {
		$rules = array(
			'name' => 'required',
			'image' => 'required',
			'transmission' => 'required',
			'description' => 'required',
			'rate' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('admin/car/add')->withErrors($validator)->withInput(Input::except('image'));
		}
		else {

			$destinationPath = 'public/assets/uploads';
			$filename = Str::lower(
			    pathinfo(Input::file('image')->getClientOriginalName(), PATHINFO_FILENAME)
			    .'-'
			    .uniqid()
			    .'.'
			    .Input::file('image')->getClientOriginalExtension()
			);

			try {
				$file = Input::file('image')->move($destinationPath, $filename);

				$car = new Car;

				$car->name = Input::get('name');
				$car->slug = Str::slug(Input::get('name'), '-');
				$car->image = $filename;
				$car->transmission = Input::get('transmission');
				$car->description = Input::get('description');
				$car->rate = Input::get('rate');

				$car->save();

				return Redirect::to('admin/car/add')->with('success', 'Successfully added!');
			} catch (Exception $e) {
				return Redirect::to('admin/car/add')->with('error', $e->getMessage())->withInput(Input::except('image'));
			}
		}

	}

}