<?php

use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagos', function($table)
	    {
	        $table->increments('id');
	        $table->string('recibo');
	        $table->string('monto');
	        $table->string('fecha');
	        $table->string('adjunto');
	        $table->integer('factura_id')->unsigned();
	        $table->foreign('factura_id')->references('id')->on('facturas');
	        $table->timestamps();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pagos');
	}

}