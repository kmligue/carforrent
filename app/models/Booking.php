<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Booking extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bookings';
	protected $dates = ['deleted_at'];

}