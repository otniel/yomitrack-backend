<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RestaurantTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $usersIds = User::lists('id');

		foreach(range(1, 30) as $index)
		{

			Restaurant::create([
                'user_id'     => $faker->randomElement($usersIds),
                'name'        => $faker->word,
                'description' => $faker->paragraph(4),
                'address'     => $faker->address,
                'latitude'    => $faker->latitude,
                'longitude'   => $faker->longitude,
                'email'       => $faker->email,
                'tel'         => $faker->phoneNumber,
                'rate'        => $faker->randomFloat($nbMaxDecimals=2, $min=1, $max=5),
                'photo1'      => $faker->imageUrl(600, 339, 'food'),
                'photo3'      => $faker->imageUrl(600, 340, 'food'),
                'photo2'      => $faker->imageUrl(601, 339, 'food'),
                'photo4'      => $faker->imageUrl(601, 340, 'food'),
                'photo5'      => $faker->imageUrl(600, 341, 'food'),
			]);
		}
	}

}