<?php

class CarTableSeeder extends Seeder {
	public function run() {
		DB::table('cars')->delete();
		Car::create(array(
			'name' => 'Honda Civic Coupe',
			'slug' => 'honda-civic-coupe',
			'image' => '2008-honda-civic-coupe-01.jpg',
			'transmission' => 'manual',
			'style' => 'sedan',
			'seating' => 5,
			'rate' => 200
		));
	}
}