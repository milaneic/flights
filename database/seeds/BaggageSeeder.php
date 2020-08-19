<?php

use App\Baggage;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class BaggageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Baggage::class, 5)->create();
    }
}
