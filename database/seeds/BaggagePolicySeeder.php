<?php

use App\AirlineCompany;
use App\BaggagePolicy;
use Illuminate\Database\Seeder;

class BaggagePolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $companies = AirlineCompany::all();
        foreach ($companies as $c) {
            foreach (App\Baggage::all() as $b) {
                if ($b->id == 1) {
                    $c->baggage_policies()->create([
                        'baggage_id' => $b->id, 'price' => 0
                    ]);
                } else {
                    $c->baggage_policies()->create([
                        'baggage_id' => $b->id, 'price' => $faker->randomElement([10, 15, 20, 25, 30, 35])
                    ]);
                }
            }
        }
    }
}
