<?php

use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table)
	    {
	        $table->increments('id');
	        $table->integer('producto_id')->unsigned();
	        $table->foreign('producto_id')->references('id')->on('products');
	        $table->integer('cantidad');
	        $table->string('precio');
	        $table->integer('factura_id')->unsigned();
	        $table->foreign('factura_id')->references('id')->on('facturas');
	        $table->string('keep');
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
		Schema::drop('items');
	}

}