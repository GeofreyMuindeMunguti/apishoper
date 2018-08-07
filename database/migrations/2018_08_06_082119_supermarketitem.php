<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Supermarketitem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Supermarketitems', function (Blueprint $table) {
            $table->increments('item_id');
             $table->string('super_id');
            $table->string('name');
            $table->string('available_number');
            $table->string('category');
            $table->string('price');
        
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
         Schema::dropIfExists('Supermarketitem');
        //
        //
    }
}
