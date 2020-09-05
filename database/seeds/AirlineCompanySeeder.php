<?php

use App\AirlineCompany;
use App\Country;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\False_;

class AirlineCompanySeeder extends Seeder
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
        $hungary = Country::where('name', 'Hungary')->first();
        $serbia = Country::where('name', 'Serbia')->first();
        $ireland = Country::where('name', 'Ireland')->first();
        $germany = Country::where('name', 'Germany')->first();
        $companies = [
            ['name' => 'Wizz', 'country_id' => $hungary->id, 'email' => $faker->email, 'phone' => $faker->phoneNumber],
            ['name' => 'AirSerbia', 'country_id' => $serbia->id, 'email' => $faker->email, 'phone' => $faker->phoneNumber],
            ['name' => 'RayanAir', 'country_id' => $ireland->id, 'email' => $faker->email, 'phone' => $faker->phoneNumber],
            ['name' => 'Lufthansa', 'country_id' => $germany->id, 'email' => $faker->email, 'phone' => $faker->phoneNumber],
        ];

        foreach ($companies as $c) {
            AirlineCompany::create($c);
        }
    }
}
