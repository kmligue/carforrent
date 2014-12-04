<?php

class LoginController extends BaseController {

	public function showLogin() {
		return View::make('admin.login');
	}

	public function doLogin()
	{
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($userdata)) {
			return View::make('admin.dashboard');
		}
		else {
			return Redirect::to('admin')->with('error', 'Invalid username and/or password!');
		}
	}

	public function doLogout() {
		Auth::logout();
		return Redirect::to('admin');
	}

}