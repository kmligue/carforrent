<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Location extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'locations';
	protected $dates = ['deleted_at'];

}