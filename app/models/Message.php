<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Message extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';
	protected $dates = ['deleted_at'];

}