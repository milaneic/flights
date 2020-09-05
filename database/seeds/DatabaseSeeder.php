<?php

use App\AirlineCompany;
use App\Baggage;
use App\BaggagePolicy;
use App\Booking;
use App\Country;
use App\Destination;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ManufactureSeeder::class);
        $this->call(AirplaneSeeder::class);
        $this->call(BaggageSeeder::class);
        $this->call(AirlineCompanySeeder::class);
        $this->call(BaggagePolicySeeder::class);
        $this->call(FlightSeeder::class);
    }
}
