<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Municipio extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'municipio';
	
	public function states(){
		return $this->belongsTo('State');
	}
		public static function getName($id)
	{
		return Municipio::find($id)->nombre;
	}

}