<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Supermarket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('supermarkets', function (Blueprint $table) {
            $table->increments('super_id');
            $table->string('name');
            $table->string('latitude');
            $table->string('longitude');
             $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('Supermarket');
        //
    }
}
