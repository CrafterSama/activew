<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class State extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'estado';

	public function municipios(){
		return $this->hasMany('Municipio');
	}
	public static function getName($id)
	{
		return State::find($id)->nombre;
	}


}