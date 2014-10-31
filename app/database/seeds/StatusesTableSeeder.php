<?php

use Faker\Factory as Faker;
use Larabook\Statuses\Status;
use Larabook\Users\User;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $usersIds = User::lists('id');

		foreach(range(1, 100) as $index)
		{
			Status::create([
                'user_id' => $faker->randomElement($usersIds),
                'body' => $faker->sentence()
			]);
		}
	}

}