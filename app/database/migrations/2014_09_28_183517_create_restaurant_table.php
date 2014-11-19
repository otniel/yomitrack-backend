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
            $table->enum('categories', array('fastfood', 'familystyle', 'finedining', 'cafe', 'mexican',
                'barngrill', 'italian', 'pizza', 'diner', 'burguers', 'seafood'))
                ->index(); /*Change me to a MySQL SET field
                            *
                            * $table_prefix = DB::getTablePrefix();
                            * DB::statement("ALTER TABLE `restaurant` CHANGE `categories` `categories` SET('fastfood', 'familystyle', 'finedining', 'cafe', 'mexican', 'barngrill', 'italian', 'pizza', 'diner', 'burguers', 'seafood');");
                            */
            $table->double('latitude', 15, 10);
            $table->double('longitude', 15, 10);
            $table->integer('radius');
            $table->string('email', 50)->nullable();
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