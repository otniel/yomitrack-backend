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
            $table->engine = "InnoDB";

            $table->unsignedInteger('restaurant_id')->unsigned();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurant')->onDelete('cascade');

            $table->unsignedInteger('customer_id')->unsigned();

            $table->foreign('customer_id')->references('id')
                ->on('customer')->onDelete('cascade');

            $table->increments('id');
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