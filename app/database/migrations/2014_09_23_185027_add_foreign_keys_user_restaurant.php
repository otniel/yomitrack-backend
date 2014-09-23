<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysUserRestaurant extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
            $table->unsignedInteger('id_restaurant')->unsigned();
            $table->foreign('id_restaurant')->references('id_restaurant')->on('restaurant')->onDelete('cascade');
		});

        Schema::table('restaurant', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
            $table->dropForeign('users_id_restaurant_foreign');
        });

        Schema::table('restaurant', function(Blueprint $table)
        {
            $table->dropForeign('restaurant_id_user_foreign');
        });
	}

}
