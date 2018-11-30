<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserseedDetailTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userseeds_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seed_name');
            $table->integer('seed_id');
            $table->string('supplier_name');
            $table->string('density');
            $table->integer('user_userseed_id');
            $table->string('measurement');
            $table->string('tray_size');
            $table->string('soak_status')->nullable();           
            $table->string('germination')->nullable();
            $table->string('situation')->nullable();
            $table->string('medium')->nullable();
            $table->string('maturity')->nullable();
            $table->integer('yield')->nullable();
            $table->string('seeds_measurement')->nullable();
            $table->string('notes')->nullable();
            $table->string('status')->default('active')->nullable();
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
        Schema::dropIfExists('userseeds_detail');
    }
}
