<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PromotionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $restaurantIds = Restaurant::lists('id');

		foreach(range(1, 100) as $index)
		{
			Promotion::create([
                'restaurant_id' => $faker->randomElement($restaurantIds),
                'name' => $faker->sentence,
                'description'   => $faker->paragraph(4),
			]);
		}
	}

}