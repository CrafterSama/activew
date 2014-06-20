<?php

use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facturas', function($table)
	    {
	        $table->increments('id');
	        $table->string('slug');

	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')->references('id')->on('users');	        
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
		Schema::drop('facturas');
	}

}