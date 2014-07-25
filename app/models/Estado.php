<?php

class Estado extends Eloquent {

    protected $table = 'estados';
	public $timestamps = false;

    public function municipios()
    {
        return $this->hasMany('Municipio','estado_id');
    } 

    public function ciudades()
    {
        return $this->hasMany('Ciudad','estado_id');
    } 

    public function getEstadoAttribute($value)
    {
    	return $value;
    }
}