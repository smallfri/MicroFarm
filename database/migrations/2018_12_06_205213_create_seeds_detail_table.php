<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeedsDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seeds_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('variety_id');
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
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seeds_detail');
	}

}
