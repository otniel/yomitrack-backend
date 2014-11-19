<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CustomerTableSeeder extends Seeder {

	public function run()
	{
        DB::statement("ALTER TABLE `customer` CHANGE `categories` `categories` SET('fastfood', 'familystyle', 'finedining', 'cafe', 'mexican', 'barngrill', 'italian', 'pizza', 'diner', 'burguers', 'seafood');");
        $faker = Faker::create();

        $categories = array('fastfood', 'familystyle', 'finedining', 'cafe', 'mexican',
            'barngrill', 'italian', 'pizza', 'diner', 'burguers', 'seafood');
		foreach(range(1, 10) as $index)
		{
			Customer::create([
                'name'       => $faker->firstName,
                'last_name'  => $faker->lastName,
                'email'      => $faker->email,
                'categories' =>  $faker->randomElement($categories) . "," . $faker->randomElement($categories),
			]);
		}
	}

}