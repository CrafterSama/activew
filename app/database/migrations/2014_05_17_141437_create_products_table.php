<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table)
        {
            $table->increments('id');
            $table->integer('print_id');
            //$table->foreign('print_id')->references('id')->on('prints');
			$table->integer('amounts');
            $table->integer('model_id');
            //$table->foreign('model_id')->references('id')->on('models');
            $table->float('model_price');
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
