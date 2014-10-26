<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant', function(Blueprint $table)
        {
            $table->engine = "InnoDB";

            $table->unsignedInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');


            $table->increments('id');
            $table->string('name', 25);
            $table->text('description');
            $table->string('address')->nullable();
            $table->float('latitude');
            $table->float('longitude');
            $table->string('email', 30)->nullable();
            $table->string('tel', 20)->nullable();
            $table->float('rate')->default(0);
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
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
        Schema::drop('restaurant');
    }

}