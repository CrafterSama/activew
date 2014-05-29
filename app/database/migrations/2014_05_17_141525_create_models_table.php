<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('models', function($table)
        {
            $table->increments('id');
            $table->string('model_name', 60);
            $table->float('price_out_tax_float');
            $table->float('price_out_tax_float_mayor');
            $table->float('price_with_tax_float');
            $table->float('price_with_tax_float_mayor');
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
		Schema::drop('models');
	}

}
