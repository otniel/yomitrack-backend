<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
class CreateCustomerTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function(Blueprint $table)
        {
            $table->engine = "InnoDB";

            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->enum('categories', array('fastfood', 'familystyle', 'finedining', 'cafe', 'mexican',
                'barngrill', 'italian', 'pizza', 'diner', 'burguers', 'seafood'))
                ->index(); /*Change me to a MySQL SET field
                            *
                            * $table_prefix = DB::getTablePrefix();
                            * DB::statement("ALTER TABLE `customer` CHANGE `categories` `categories` SET('fastfood', 'familystyle', 'finedining', 'cafe', 'mexican', 'barngrill', 'italian', 'pizza', 'diner', 'burguers', 'seafood');");
                            */
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
        Schema::drop('customer');
    }

}
