<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('N°_house');
            $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->integer('people_id')->unsigned();
            $table->foreign('people_id')->references('id')->on('peoples')->onDelete('cascade');
            
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
        Schema::dropIfExists('addresses');
    }
}
