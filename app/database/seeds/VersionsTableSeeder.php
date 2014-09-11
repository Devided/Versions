<?php
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VersionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $plugins = Plugin::all();

        foreach($plugins as $plugin)
        {
            foreach(range(1, rand(2,10)) as $index)
            {
                Version::create([
                    'name' => $faker->randomFloat(2, 0, 9),
                    'risk' => rand(0,3),
                    'plugin_id' => $plugin->id
                ]);
            }
        }
	}

}