<?php

class ConfigurationsController extends \BaseController {

	public function getConfig()
	{
		$config = Configuration::paginate(10);
		return View::make('admin.config',compact('config'));
	}
	public function updateConfig()
	{
		
	}

}
