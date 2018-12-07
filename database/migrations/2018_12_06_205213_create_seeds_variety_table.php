<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeedsVarietyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seeds_variety', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('seed_id');
			$table->string('name')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->string('url')->nullable();
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
		Schema::drop('seeds_variety');
	}

}
