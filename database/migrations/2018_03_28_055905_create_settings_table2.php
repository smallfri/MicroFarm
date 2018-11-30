<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        return;
         Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('googleplus');
            $table->string('address');
            $table->string('contactno');
            $table->string('contactno1');
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
        Schema::dropIfExists('setting');
    }
}
