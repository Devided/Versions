<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{

			User::create([
                'username'  =>  'jerre',
                'email'     =>  'jerre.bau@gmail.com',
                'password'  =>  Hash::make('secret')
			]);

            User::create([
                'username'  =>  'duco',
                'email'     =>  'duco@devided.com',
                'password'  =>  Hash::make('test')
            ]);
	}

}