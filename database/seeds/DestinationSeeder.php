<?php

use App\Airport;
use App\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Destination::class)->create()->each(function ($destination) {
            factory(Airport::class)->create([
                'destination_id' => $destination->id,
                'name' => $destination->name . ' Airport'
            ]);
        });
    }
}
