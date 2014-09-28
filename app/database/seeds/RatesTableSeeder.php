<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RatesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $restaurantIds = Restaurant::lists('id');
        $customerIds   = Customer::lists('id');

		foreach(range(1, 50) as $index)
		{
			Rate::create([
                'restaurant_id' => $faker->randomElement($restaurantIds),
                'customer_id'   => $faker->randomElement($customerIds),
                'rate'          => $faker->numberBetween($min = 0, $max = 5),
                'comments'      => $faker->text
			]);
		}
	}

}