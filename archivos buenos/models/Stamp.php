<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Stamp extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'stamps';

		/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */

	public function stampToProduct()
	{
		return $this->belongTo('Product');
	}
	public static function getId($name)
	{
		$stamp = Stamp::find($name)->where();
		$stampId = $stamp->id();
		return $stampId;
	}
	public static function getName($id)
	{
		$stamp = Stamp::find($id);
		$stampName = $stamp->stamp;
		return $stampName;
	}

}