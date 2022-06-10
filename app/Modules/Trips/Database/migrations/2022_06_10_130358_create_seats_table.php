<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip');
            $table->foreign('trip')->references('id')->on('trips')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('from');
            $table->foreign('from')->references('id')->on('stations')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('to');
            $table->foreign('to')->references('id')->on('stations')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('seats');
    }
}
