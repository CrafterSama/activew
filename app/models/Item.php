<?php

class Item extends Eloquent {

	protected $table = 'items';
	public $timestamp = true;
	protected $softDelete = true;


	public function product()
    {
        return $this->hasOne('Product', 'id', 'producto_id');
    }
    public function factura()
    {
    	return $this->hasOne('Factura', 'id', 'factura_id');
    }

}