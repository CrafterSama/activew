<?php

class Pago extends Eloquent {

	protected $table = 'pagos';
	public $timestamp = true;

	public function factura()
    {
        return $this->hasOne('Factura');
    }

}