<?php

use App\Country;
use App\Destination;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(Country::class, 100)->create()->each(function ($c) {
            factory(Destination::class)->create(['country_id' => $c->id]);
        });
    }
}
