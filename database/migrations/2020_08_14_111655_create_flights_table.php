<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->timestamp('departure_time')->nullable();
            $table->timestamp('arrival_time')->nullable();
            $table->bigInteger('departure_airport_id')->unsigned();
            $table->bigInteger('arrival_airport_id')->unsigned();
            $table->foreign('departure_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('arrival_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->integer('gate');
            $table->foreignId('airplane_id')->constrained()->onDelete('cascade');
            $table->double('min_price');
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
        Schema::dropIfExists('flights');
    }
}
