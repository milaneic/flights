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
                } else if ($b->id == 2) {
                    $c->baggage_policies()->create([
                        'baggage_id' => $b->id, 'price' => $faker->randomElement([10, 15])
                    ]);
                } else if ($b->id == 3) {
                    $c->baggage_policies()->create([
                        'baggage_id' => $b->id, 'price' => $faker->randomElement([20, 25])
                    ]);
                } else if ($b->id == 4) {
                    $c->baggage_policies()->create([
                        'baggage_id' => $b->id, 'price' => $faker->randomElement([30, 35])
                    ]);
                } else {
                    $c->baggage_policies()->create([
                        'baggage_id' => $b->id, 'price' => $faker->randomElement([40, 45])
                    ]);
                }
            }
        }
    }
}
