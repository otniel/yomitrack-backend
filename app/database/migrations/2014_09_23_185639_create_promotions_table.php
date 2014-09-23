<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promotions', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
            $table->increments('id_promotion');

            $table->unsignedInteger('id_restaurant')->unsigned();
            $table->foreign('id_restaurant')->references('id_restaurant')->on('restaurant')->onDelete('cascade');


			$table->string('name');
			$table->text('description');
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
		Schema::drop('promotions');
	}

}
