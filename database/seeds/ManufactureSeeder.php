<?php

use App\Airplane;
use App\Country;
use App\Manufacture;
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Faker\Provider\Base;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $holand = Country::where('name', 'Netherlands')->first();
        $usa = Country::where('name', 'United States')->first();
        $manufactures = [
            ['name' => 'Airbus', 'country_id' => $holand->id],
            ['name' => 'Boing', 'country_id' => $usa->id]
        ];

        foreach ($manufactures as $m) {
            Manufacture::create($m);
        }
    }
}
