<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Modelo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'modelos';

	public static $rules = array(
		'model_name' 	=> 'required|unique:modelos,model_name,id',
		'price_out_tax_float' 	=> 'required',
/*		'email' 		=> 'required|email|unique:users,email,id',
		'password' 	=> 'required|min:6',
		'role_id' 	=> 'numeric'*/
   	);

   	public static $messages = array(
		'model_name.required' => 'El nombre del modelo es obligatorio.',
		'model_name.unique' => 'El nombre ya esta en el sistema.',
		'price_out_tax_float.require' => 'El Campo del precio es Obligatorio.'
   	);
   	public static function validate($data, $id=null){
		$reglas = self::$rules;
		$reglas['model_name'] = str_replace('id', $id, self::$rules['model_name']);
		$messages = self::$messages;
		return Validator::make($data, $reglas);
   	}

	public static function getName($id)
	{
		$modelo = Modelo::find($id);
		return $modelo->model_name;
	}
	public static function getPrice($id)
	{
		$modelo = Modelo::find($id);
		return $modelo->price_out_tax_float;
	}

}