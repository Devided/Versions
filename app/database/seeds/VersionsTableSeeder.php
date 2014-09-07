<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VersionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $plugins = Plugin::lists('id');

		foreach(range(1, 10) as $index)
		{
			Version::create([
                'name' => $faker->randomDigit,
                'risk' => rand(0,3),
                'plugin_id' => $plugins[$i]
			]);
		}
	}

}