<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('car_id');
			$table->string('fname', 255);
			$table->string('lname', 255);
			$table->string('email', 255);
			$table->string('credit_card_no', 255);
			$table->string('cc_expire_date', 255);
			$table->integer('cc_code');
			$table->integer('location_id');
			$table->integer('return_location')->nullable();
			$table->timestamp('pick_up_date');
			$table->time('pick_up_time');
			$table->timestamp('return_date');
			$table->time('return_time');
			$table->string('status', 255);
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
		Schema::drop('bookings');
	}

}
