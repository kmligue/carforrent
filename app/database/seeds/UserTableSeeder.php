<?php

class UserTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete();
		User::create(array(
			'fname' => 'John',
			'lname' => 'Doe',
			'username' => 'admin',
			'password' => Hash::make('admin')
		));
	}
}