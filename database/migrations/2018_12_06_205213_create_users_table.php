<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id')->unsigned()->nullable()->index('users_role_id_foreign');
			$table->string('name', 191)->nullable()->default('');
			$table->string('email', 191)->default('')->unique();
			$table->string('avatar', 191)->nullable()->default('users/default.png');
			$table->string('password', 191)->default('');
			$table->string('status', 191)->nullable()->default('active');
			$table->string('language', 10)->nullable()->default('en');
			$table->dateTime('created_by')->nullable();
			$table->string('remember_token', 191)->nullable();
			$table->text('settings', 65535)->nullable();
			$table->timestamps();
			$table->boolean('is_active')->nullable();
			$table->string('activation_token', 191)->nullable();
			$table->dateTime('activation_time')->nullable();
			$table->dateTime('last_login')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
