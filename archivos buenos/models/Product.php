<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'products';

	public function ProdToStamp()
	{
 		return $this->hasMany('Stamp');
	}
	/*public static $rules = array(
		'amounts_' 	=> 'required|numeric',
		/*'price_out_tax_float' 	=> 'required',
		'email' 		=> 'required|email|unique:users,email,id',
		'password' 	=> 'required|min:6',
		'role_id' 	=> 'numeric'
   	);*/

   	public static $messages = array(
		'amounts.required' => 'Rellenar la Cantidad es obligatorio',
		'amounts.numeric' => 'Cantidad solo acepta Datos Numericos',
   	);
   	public static function validate($data, $id=null){
		$reglas = self::$rules;
		$reglas['amounts'] = str_replace('id', $id, self::$rules['amounts']);
		$messages = self::$messages;
		return Validator::make($data, $reglas);
   	}
   	public static function getAmounts($id)
   	{
   		$amounts = DB::table('products')
                    ->where('model_id','=', $id)
                    ->pluck(DB::raw('sum(amounts)'));

        return $amounts;
   	}

}