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
    public static function totalFactura($id)
    {
        $totales = DB::table('items')->where('factura_id','=',$id);
        print_r($totales);
        
        /*if (is_null($totales)) {
            return 'No Hay Monto Asociado';
        } else {
            $tFactura = 0;
            foreach ($totales as $total) {
                $tFactura += $total->cantidad*$total->precio;
            }
            return $tFactura;
        }*/
    }
}