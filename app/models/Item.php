<?php

class Item extends Eloquent {

	protected $table = 'items';
	public $timestamp = true;

	public function producto()
    {
        return $this->hasOne('Producto', 'id');
    }

}