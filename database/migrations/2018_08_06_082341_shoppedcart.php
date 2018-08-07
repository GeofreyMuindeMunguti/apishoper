<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shoppedcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('shoppedcarts', function (Blueprint $table) {
            $table->increments('shoppedcart_id');
            $table->string('user_email');
            $table->string('item');
            $table->string('number');
            $table->string('delivery_address');
            $table->string('boda_id');
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
         Schema::dropIfExists('shoppedcarts');
        //
    }
}
