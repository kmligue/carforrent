<?php

class CarTableSeeder extends Seeder {
	public function run() {
		DB::table('cars')->delete();
		Car::create(array(
			'name' => 'Honda Civic Coupe',
			'slug' => 'honda-civic-coupe',
			'image' => '2008-honda-civic-coupe-01.jpg',
			'transmission' => 'manual',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro deleniti esse alias laudantium incidunt, nam aliquid dolor mollitia animi ipsam eius ipsum dolore voluptas, possimus itaque atque voluptate. Fugiat, dolores.',
			'rate' => 200
		));
	}
}