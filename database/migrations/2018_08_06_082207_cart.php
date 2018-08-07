<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('carts', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->string('user_email');
              $table->string('super_id');
             $table->string('item');
            $table->string('number');
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
         Schema::dropIfExists('carts');
        //
    }
}
