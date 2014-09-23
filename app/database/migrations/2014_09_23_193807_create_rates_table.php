<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rates', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

            $table->unsignedInteger('id_restaurant')->unsigned();
            $table->foreign('id_restaurant')->references('id_restaurant')->on('restaurant')->onDelete('cascade');

            $table->unsignedInteger('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id_customer')->on('customer')->onDelete('cascade');


			$table->increments('id_rate');
			$table->float('rate');
			$table->text('comments')->nullable();
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
		Schema::drop('rates');
	}

}
