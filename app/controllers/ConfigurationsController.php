<?php

class ConfigurationsController extends \BaseController {

	public function getConfig()
	{
		$config = Configuration::all();
		return View::make('admin.config',compact('config'));
	}
	public function updateConfig()
	{
		
	}

}
