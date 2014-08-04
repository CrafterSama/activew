<?php

class ConfigurationsController extends BaseController {

	public function edit()
	{
		$config = Configuration::paginate(10);
		return View::make('admin.config',compact('config'));
	}
	public function update()
	{
		
		$iva = Input::get('iva');
		$discount = Input::get('wholesale_discount');

		DB::table('configurations')
            ->where('config_name', 'iva')
            ->update(array('config_value' => $iva));
		DB::table('configurations')
            ->where('config_name', 'wholesale_discount')
            ->update(array('config_value' => $discount));

		
		return Redirect::back()->with('notice','Configuracion guardada de forma satisfactoria');;
	}

}
