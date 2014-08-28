<?php

class ConfigurationsController extends BaseController {

	public function edit()
	{
		$config = Configuration::paginate(10);
		return View::make('admin.config',compact('config'));
	}
	public function update()
	{
		$params = ['iva' , 'wholesale_discount'];

		foreach ($params as $key => $param) {
			DB::table('configurations')
	            ->where('config_name', $param)
	            ->update(array('config_value' => Input::get($param)));
		}
		
		return Redirect::back()->with('notice','Configuracion guardada de forma satisfactoria');;
	}

}
