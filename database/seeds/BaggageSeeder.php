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
        $baggages = [
            ['type' => 'Free handed luggage', 'description' => 'This baggage is free.'],
            ['type' => 'Trolley bag', 'description' => 'This baggage is free.'],
            ['type' => 'Small check-in', 'description' => 'This baggage is free.'],
            ['type' => 'Medium check-in', 'description' => 'This baggage is free.'],
            ['type' => 'Big check-in', 'description' => 'This baggage is free.']
        ];
        foreach ($baggages as $b) {
            Baggage::create($b);
        }
    }
}
