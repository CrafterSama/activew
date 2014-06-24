<?php

class Item extends Eloquent {

	protected $table = 'items';
	public $timestamp = true;

	public function product()
    {
        return $this->hasOne('Product', 'id', 'producto_id');
    }

}