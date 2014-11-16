<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RestaurantTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $usersIds = User::lists('id');

		foreach(range(1, 32) as $index)
		{

			Restaurant::create([
                'user_id'     => $faker->randomElement($usersIds),
                'name'        => $faker->word,
                'description' => $faker->paragraph(4),
                'address'     => $faker->address,
                'latitude'    => $faker->latitude,
                'longitude'   => $faker->longitude,
                'radius'      => '300',
                'email'       => $faker->email,
                'tel'         => $faker->phoneNumber,
                'rate'        => $faker->randomFloat($nbMaxDecimals=2, $min=1, $max=5),
                'photo1'      => $faker->imageUrl(750, 479, 'food'),
                'photo3'      => $faker->imageUrl(750, 480, 'food'),
                'photo2'      => $faker->imageUrl(751, 489, 'food'),
                'photo4'      => $faker->imageUrl(751, 490, 'food'),
                'photo5'      => $faker->imageUrl(750, 491, 'food'),
			]);
		}
	}

}