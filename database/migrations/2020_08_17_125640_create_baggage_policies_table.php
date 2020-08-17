<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaggagePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baggage_policies', function (Blueprint $table) {
            $table->primary(['baggage_id', 'airline_company_id']);
            $table->foreignId('baggage_id')->constrained()->onDelete('cascade');
            $table->foreignId('airline_company_id')->constrained()->onDelete('cascade');
            $table->double('price');
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
        Schema::dropIfExists('baggage_policies');
    }
}
