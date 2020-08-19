<?php

use App\AirlineCompany;
use Illuminate\Database\Seeder;

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
        factory(AirlineCompany::class, 4)->create();
    }
}
