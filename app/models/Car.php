<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Car extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cars';
	protected $dates = ['deleted_at'];

}