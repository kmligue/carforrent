<?php

class AccountController extends BaseController {

	public function showCreateUser() {
		return View::make('admin.createUser');
	}

	public function createUser() {
		$rules = array(
			'fname' => 'required',
			'lname' => 'required',
			'username' => 'required',
			'password' => 'required'
		);

		$messages = array(
			'fname.required' => 'First Name field is required.',
			'lname.required' => 'Last Name field is required',
			'username.required' => 'Username field is required',
			'password.required' => 'Password field is required'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		}
		else {
			$user = new User;
			$user->fname = Input::get('fname');
			$user->lname = Input::get('lname');
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));

			if($user->save()) {
				return Redirect::back()->with('success', 'Successfully saved!');
			}
			else {
				return Redirect::back()->with('error', 'Something went wrong!');
			}
		}
	}

	public function showChangePass() {
		return View::make('admin.changePassword');
	}

	public function changePass() {
		$user = User::findOrFail(Auth::user()->id);

		$user->password = Hash::make(Input::get('password'));

		if($user->save()) {
			return Redirect::back()->with('success', 'Successfully saved!');
		}
		else {
			return Redirect::back()->with('error', 'Something went wrong!');
		}
	}

}