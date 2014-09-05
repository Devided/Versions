<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ApplicationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 500) as $index)
		{
			Application::create([
                'name'      =>  $faker->word,
                'active'    =>  rand(0,1),
                'url'       =>  $faker->url
			]);
		}
	}

}