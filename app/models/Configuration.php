<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Configuration extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'configurations';

	public static function getIva()
	{
		$value = Configuration::where('config_name','=','iva')->pluck('config_value');
		return $value;
	}

	public static function getDiscount()
	{
		$value = Configuration::where('config_name','=','wholesale_discount')->pluck('config_value');
		return $value;
	}

	public static function getMayor()
	{
		$value = Configuration::where('config_name','=','wholesaling')->pluck('config_value');
		return $value;
	}

}