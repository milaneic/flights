<?php

use App\Booking;
use App\Flight;
use App\Passenger;
use App\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Mockery\Generator\StringManipulation\Pass\Pass;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $faker = Faker\Factory::create();
        foreach (App\Airport::all() as $airport) {
            $date = Carbon::today();
            for ($i = 0; $i < 5; $i++) {
                $airplane = App\Airplane::where('id', rand(1, 4))->first();
                $flight = App\Flight::create([
                    'departure_time' => $date->addMinutes(30),
                    'arrival_time' => $date,
                    'departure_airport_id' => $airport->id,
                    'arrival_airport_id' => rand(1, 597),
                    'airline_company_id' => rand(1, 4),
                    'gate' => rand(1, 24),
                    'airplane_id' => $airplane->id,
                    'min_price' => $faker->randomElement([30, 90, 115, 190, 300, 400, 140]),
                    'available_seats' => $airplane->capacity,
                    'seats_capacity' => $airplane->capacity,
                    'seats_map' => $airplane->seats
                ]);
                echo $i . "    " . $flight->id . "<br>";
                $booking = App\Booking::create(
                    [
                        'flight_id' => $flight->id,
                        'user_id' => rand(1, 100),
                        'amount' => $flight->min_price * 2,
                        'is_confirmed' => 0

                    ]
                );
                for ($j = 0; $j < 2; $j++) {
                    $pass = App\Passenger::create(
                        [
                            'first_name' => $faker->firstName,
                            'last_name' => $faker->lastName,
                            'gender' => $faker->randomElement(['male', 'female']),
                            'document_type' => $faker->randomElement(['card', 'passport']),
                            'document_number' => $faker->numerify('##########')
                        ]
                    );

                    App\Ticket::create(
                        [
                            'booking_id' => $booking->id,
                            'passenger_id' => $pass->id,
                            'price' => $flight->min_price,
                            'seat' => rand(1, 160)
                        ]
                    );
                }
            }
        }
    }
}
