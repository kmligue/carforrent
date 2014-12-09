<?php

class LocationTableSeeder extends Seeder {
	public function run() {
		DB::table('locations')->delete();
		Location::create(array(
			'address' => 'Ubujan District Tagbilaran City'
		));
	}
}