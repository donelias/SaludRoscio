<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('photo');
            $table->string('code')->unique();
            $table->string('name');
            $table->decimal('grams');
            $table->date('expiration_date');
            $table->float('quantityproduct');
            $table->float('quantityexisting');

            $table->integer('typemedicine_id')->unsigned();
            $table->foreign('typemedicine_id')->references('id')->on('typemedicines')->onDelete('cascade');

            $table->integer('classification_id')->unsigned();
            $table->foreign('classification_id')->references('id')->on('classifications')->onDelete('cascade');

            $table->integer('drug_id')->unsigned();
            $table->foreign('drug_id')->references('id')->on('drugs');

            $table->integer('measurement_id')->unsigned();
            $table->foreign('measurement_id')->references('id')->on('measurements')->onDelete('cascade');

            $table->integer('laboratory_id')->unsigned();
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');

            $table->integer('statu_id')->unsigned();
            $table->foreign('statu_id')->references('id')->on('status')->onDelete('cascade');

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
        Schema::drop('products');
    }
}
