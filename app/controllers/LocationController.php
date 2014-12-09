<?php

class LocationController extends BaseController {

	public function location() {
		$locations = Location::paginate(2);

		return View::make('admin.location')->with('locations', $locations);
	}

	public function showLocation($id) {

		$location = Location::findOrFail($id);

		return View::make('admin.locationEdit')->with('location', $location);

	}

	public function showArchive() {
		$locations = Location::onlyTrashed()
					->paginate(2);

		return View::make('admin.locationArchive')->with('locations', $locations);
	}

	public function addLocation() {
		$rules = array(
			'address' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('admin/location/add')->withErrors($validator)->withInput(Input::all());
		}
		else {

			try {

				$location = new Location;

				$location->address = Input::get('address');

				$location->save();

				return Redirect::to('admin/location/add')->with('success', 'Successfully added!');
			} catch (Exception $e) {
				return Redirect::to('admin/location/add')->with('error', $e->getMessage())->withInput(Input::except('image'));
			}
		}

	}

	public function editLocation($id) {

		$rules = array(
			'address' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('admin/location/'. $id . '/edit')->withErrors($validator)->withInput(Input::all());
		}
		else {
			try {
				$location = Location::findOrFail($id);

				$location->address = Input::get('address');

				$location->save();

				return Redirect::to('admin/location/'. $id . '/edit')->with('success', 'Successfully updated!');
			} catch (Exception $e) {
				return Redirect::to('admin/location/'. $id . '/edit')->with('error', $e->getMessage())->withInput(Input::except('image'));
			}
		}

	}

	public function archiveLocation($id) {

		try {
			$location = Location::findOrFail($id);
			$location->delete();

			return Redirect::to('admin/location')->with('success', 'Successfully deleted!');
		} catch (Exception $e) {
			return Redirect::to('admin/location')->with('error', $e->getMessage());
		}

	}

	public function restoreLocation($id) {

		try {
			$location = Location::withTrashed()->where('id', '=', $id)->restore();

			return Redirect::to('admin/location/archive')->with('success', 'Successfully restored!');
		} catch (Exception $e) {
			return Redirect::to('admin/location/archive')->with('error', $e->getMessage());
		}

	}

}