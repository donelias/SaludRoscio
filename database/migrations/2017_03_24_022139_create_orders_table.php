<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('typeorder_id')->unsigned();
            $table->foreign('typeorder_id')->references('id')->on('typeorders')->onDelete('cascade');

            $table->integer('personAuthorizes_id')->unsigned();
            $table->foreign('personAuthorizes_id')->references('id')->on('peoples')->onDelete('cascade');

            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('peoples')->onDelete('cascade');

            $table->integer('personWithdraw_id')->unsigned();
            $table->foreign('personWithdraw_id')->references('id')->on('peoples')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
