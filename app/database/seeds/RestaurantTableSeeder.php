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
                'user_id' => $faker->randomElement($usersIds),
                'name' => $faker->sentence,
                'description' => $faker->paragraph(4),
                'address' => $faker->address,
                'email' => $faker->email,
                'tel' => $faker->phoneNumber,
                'rate' => $faker->randomFloat($nbMaxDecimals=2, $min=0, $max=1),
                'photo1' => $faker->imageUrl(644, 199),
                'photo3' => $faker->imageUrl(644, 200),
                'photo2' => $faker->imageUrl(643, 200),
                'photo4' => $faker->imageUrl(643, 199),
                'photo5' => $faker->imageUrl(643, 198),
			]);
		}
	}

}