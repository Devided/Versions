<?php
class DatabaseSeeder extends Seeder {

     protected $tables = [
        'users', 'applications', 'plugins', 'versions'
     ];

     protected $seeders = [
        'UsersTableSeeder',
        'ApplicationsTableSeeder',
        'PluginsTableSeeder',
        'VersionsTableSeeder'
     ];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->cleanDatabase();

		foreach($this->seeders as $seeder)
        {
            $this->call($seeder);
        }
	}

    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
