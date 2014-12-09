<?php

class CarController extends BaseController {

	public function car() {
		$cars = Car::paginate(2);

		return View::make('admin.car')->with('cars', $cars);
	}

	public function showCar($id) {

		$car = Car::findOrFail($id);

		return View::make('admin.carEdit')->with('car', $car);

	}

	public function showArchive() {
		$cars = Car::onlyTrashed()
					->paginate(2);

		return View::make('admin.carArchive')->with('cars', $cars);
	}

	public function addCar() {
		$rules = array(
			'name' => 'required',
			'image' => 'required|image',
			'transmission' => 'required',
			'style' => 'required',
			'seating' => 'required|integer',
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
				$car->style = Input::get('style');
				$car->seating = Input::get('seating');
				$car->rate = Input::get('rate');

				$car->save();

				return Redirect::to('admin/car/add')->with('success', 'Successfully added!');
			} catch (Exception $e) {
				return Redirect::to('admin/car/add')->with('error', $e->getMessage())->withInput(Input::except('image'));
			}
		}

	}

	public function editCar($id) {

		$rules = array(
			'name' => 'required',
			'image' => 'image',
			'transmission' => 'required',
			'style' => 'required',
			'seating' => 'required|integer',
			'rate' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('admin/car/'. $id . '/edit')->withErrors($validator)->withInput(Input::except('image'));
		}
		else {
			try {
				$car = Car::findOrFail($id);

				$car->name = Input::get('name');
				$car->transmission = Input::get('transmission');
				$car->style = Input::get('style');
				$car->seating = Input::get('seating');
				$car->rate = Input::get('rate');

				if(Input::hasFile('image')) {
					$destinationPath = 'public/assets/uploads';
					$filename = Str::lower(
					    pathinfo(Input::file('image')->getClientOriginalName(), PATHINFO_FILENAME)
					    .'-'
					    .uniqid()
					    .'.'
					    .Input::file('image')->getClientOriginalExtension()
					);

					$file = Input::file('image')->move($destinationPath, $filename);

					$car->image = $filename;
				}

				$car->save();

				return Redirect::to('admin/car/'. $id . '/edit')->with('success', 'Successfully updated!');
			} catch (Exception $e) {
				return Redirect::to('admin/car/'. $id . '/edit')->with('error', $e->getMessage())->withInput(Input::except('image'));
			}
		}

	}

	public function archiveCar($id) {

		try {
			$car = Car::findOrFail($id);
			$car->delete();

			return Redirect::to('admin/car')->with('success', 'Successfully deleted!');
		} catch (Exception $e) {
			return Redirect::to('admin/car')->with('error', $e->getMessage());
		}

	}

	public function restoreCar($id) {

		try {
			$car = Car::withTrashed()->where('id', '=', $id)->restore();

			return Redirect::to('admin/car/archive')->with('success', 'Successfully restored!');
		} catch (Exception $e) {
			return Redirect::to('admin/car/archive')->with('error', $e->getMessage());
		}

	}

}