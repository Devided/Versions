<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('versions', function(Blueprint $table)
		{
		    $table->text('css')->nullable();
            $table->text('js')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('versions', function(Blueprint $table)
		{
			$table->dropColumn('css');
            $table->dropColumn('js');
		});
	}

}
