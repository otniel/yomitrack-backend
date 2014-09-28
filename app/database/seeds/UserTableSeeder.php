<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			User::create([
                'username' => $faker->username,
                'email'    => $faker->email,
                'password' => Hash::make($faker->word)
			]);
		}
	}

}