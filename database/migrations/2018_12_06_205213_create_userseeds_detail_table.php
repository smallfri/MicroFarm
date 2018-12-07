<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserseedsDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userseeds_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('seed_name', 191);
			$table->integer('variety_id');
			$table->integer('supplier_id');
			$table->string('density', 191)->nullable();
			$table->integer('user_id');
			$table->string('measurement', 191);
			$table->string('tray_size', 191);
			$table->string('soak_status', 191)->nullable();
			$table->string('germination', 191)->nullable();
			$table->string('situation', 191)->nullable();
			$table->string('medium', 191)->nullable();
			$table->string('maturity', 191)->nullable();
			$table->integer('yield')->nullable();
			$table->string('seeds_measurement', 191)->nullable();
			$table->string('notes', 191)->nullable();
			$table->integer('status')->nullable()->default(0);
			$table->softDeletes();
			$table->timestamps();
			$table->integer('seed_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userseeds_detail');
	}

}
