<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('setting', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 191);
			$table->string('twitter', 191);
			$table->string('facebook', 191);
			$table->string('youtube', 191);
			$table->string('googleplus', 191);
			$table->string('address', 191);
			$table->string('contactno', 191);
			$table->string('contactno1', 191);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('setting');
	}

}
