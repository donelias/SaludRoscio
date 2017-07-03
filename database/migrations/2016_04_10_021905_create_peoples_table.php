<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('identificationcard');
            $table->string('phone');

            $table->integer('typeperson_id')->unsigned();
            $table->foreign('typeperson_id')->references('id')->on('typepersons')->onDelete('cascade');

            $table->integer('typeidentificationcard_id')->unsigned();
            $table->foreign('typeidentificationcard_id')->references('id')->on('typeidentificationcards')->onDelete('cascade');

            $table->integer('classificationperson_id')->unsigned();
            $table->foreign('classificationperson_id')->references('id')->on('classificationpersons')->onDelete('cascade');

            
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
        Schema::dropIfExists('peoples');
    }
}
