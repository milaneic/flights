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
            $table->bigInteger('destination_from')->unsigned();
            $table->bigInteger('destination_to')->unsigned();
            $table->foreign('destination_from')->references('id')->on('destinations')->onDelete('cascade');
            $table->foreign('destination_to')->references('id')->on('destinations')->onDelete('cascade');
            $table->integer('gate');
            $table->foreignId('airplane_id')->constrained()->onDelete('cascade');
            $table->foreignId('airport_id')->constrained()->onDelete('cascade');
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
