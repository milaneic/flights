<?php

use App\Airplane;
use Illuminate\Database\Seeder;

class AirplaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a320 = file_get_contents(storage_path('json/seats/a320.json'));
        $a320neo = file_get_contents(storage_path('json/seats/a320neo.json'));
        $A737_700 = file_get_contents(storage_path('json/seats/737-700.json'));
        $A737_800 = file_get_contents(storage_path('json/seats/737-800.json'));
        //
        $airplanes = [
            ['manufacture_id' => 1, 'model' => 'A320', 'seats' => $a320, 'capacity' => 180],
            ['manufacture_id' => 1, 'model' => 'A320 NEO', 'seats' => $a320neo, 'capacity' => 150],
            ['manufacture_id' => 2, 'model' => '737-700', 'seats' => $A737_700, 'capacity' => 150],
            ['manufacture_id' => 2, 'model' => '737-800', 'seats' => $A737_800, 'capacity' => 180]
        ];
        foreach ($airplanes as $a) {
            Airplane::create($a);
        }
    }
}
