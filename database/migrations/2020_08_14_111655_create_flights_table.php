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
            $table->bigInteger('departure_airport_id')->unsigned();
            $table->bigInteger('arrival_airport_id')->unsigned();
            $table->foreign('departure_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('arrival_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->timestamp('departure_time')->nullable();
            $table->timestamp('arrival_time')->nullable();
            $table->integer('gate');
            $table->foreignId('airplane_id')->constrained()->onDelete('cascade');
            $table->foreignId('airline_company_id')->constrained()->onDelete('cascade');
            $table->double('min_price');
            $table->integer('available_seats');
            $table->integer('seats_capacity');
            $table->text('seats_map');
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
