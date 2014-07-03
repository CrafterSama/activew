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
    public static function countItems($id)
    {
        $items = Item::where('factura_id','=',$id)->get();
        return count($items);
    }
}