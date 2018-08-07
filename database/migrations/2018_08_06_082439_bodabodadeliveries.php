<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bodabodadeliveries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('Bodabodadeliveries', function (Blueprint $table) {
            $table->increments('delivery_id');
            $table->string('boda_id');
            $table->string('email');
            $table->string('shoppedcart_id');
            $table->string('delivery_address');
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
         Schema::dropIfExists('Bodabodadeliveries');
        //
    }
}
