<?php

use App\AirlineCompany;
use App\Airport;
use App\Country;
use App\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use function GuzzleHttp\json_decode;

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
        $faker = Faker::create();

        $json = file_get_contents(storage_path('json/countries.json'));
        $json2 = file_get_contents(storage_path('json/airports.json'));
        $objs2 = json_decode($json2, true);
        $objs = json_decode($json, true);



        foreach ($objs as $obj) {
            $country = Country::create([
                'name' => $obj['name'],
                'country_code' => $obj['code']
            ]);
            $brojac = 0;
            foreach ($objs2 as $obj2) {
                if ($obj['code'] == $obj2['iso_country'] && $obj2['municipality'] != null && $obj2['name'] != null && $obj2['ident'] != null) {
                    $brojac++;
                    $destination = App\Destination::create([
                        'name' => $obj2['municipality'],
                        'country_id' => $country->id,
                        'description' => $obj2['municipality'],
                    ]);
                    $airport = App\Airport::create([
                        'destination_id' => $destination->id,
                        'name' => $obj2['name'],
                        'ident' => $obj2['ident']
                    ]);
                }
            }
        }
    }
}
