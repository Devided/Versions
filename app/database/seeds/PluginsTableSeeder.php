<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PluginsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 25) as $index) {
            Plugin::create([
                'name' => $faker->domainWord,
            ]);
        }
    }
}
