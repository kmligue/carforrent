<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->string('slug', 255);
			$table->string('image', 255);
			$table->string('transmission', 64);
			$table->string('style', 255);
			$table->integer('seating');
			$table->double('rate', 15, 8);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cars');
	}

}
