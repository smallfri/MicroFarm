<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeds_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seed_id');
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
        Schema::dropIfExists('seeds_detail');
    }
}
