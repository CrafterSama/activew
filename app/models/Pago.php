<?php

class Pago extends Eloquent {

	protected $table = 'pagos';
	public $timestamp = true;

	public function factura()
    {
        return $this->hasOne('Factura');
    }
    public static function getAdj($id)
    {
    	$pay = DB::table('pagos')
    				->where('factura_id','=',$id)
    				->pluck('adjunto');
    	if ($pay) {
    		return $pay;
    	} else {
			return 'Sin Pagar';
    	}
    	
    }
}