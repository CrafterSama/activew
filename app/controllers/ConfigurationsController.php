<?php

class ConfigurationsController extends \BaseController {

	public function getConfig()
	{
		$config = Configuration::paginate(10);
		return View::make('admin.config',compact('config'));
	}
	public function updateConfig()
	{
		$config = Configuration::all();

		$config->where('config_name','=','iva')->config_value = Input::get('iva');
		$config->where('config_name','=','wholesale_discount')->config_value = Input::get('wholesale_discount');
		
		$config->save();
		
		return Redirect::back();
	}

}
