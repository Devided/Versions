<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{

			User::create([
                'username'  =>  'boyd',
                'email'     =>  'boyd@maximum.com',
                'password'  =>  Hash::make('test')
			]);

            User::create([
                'username'  =>  'duco',
                'email'     =>  'duco@devided.com',
                'password'  =>  Hash::make('test')
            ]);
	}

}