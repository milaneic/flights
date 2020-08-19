<?php

use App\Booking;
use App\Flight;
use App\Passenger;
use App\Ticket;
use Illuminate\Database\Seeder;
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
        //
        // factory(Flight::class, 100)->create()->each(function ($flight) {
        //     $flight->bookings()->saveMany(
        //         factory(Booking::class, 4)->make(
        //             ['flight_id' => $flight->id]
        //         )->each(function ($booking) {
        //             factory(Passenger::class, 800)->create()->each(function ($pass) {
        //                 $pass->tickets()->saveMany(
        //                     factory(Ticket::class)->make(
        //                         [
        //                             'booking_id' => $booking->id,
        //                             'passenger_id' => $pass->id
        //                         ]
        //                     )
        //                 );
        //             })
        //         })
        //     );
        // });


        factory(Flight::class, 100)->create()->each(function ($flight) {
            factory(Booking::class, 4)->create(['flight_id' => $flight->id])->each(function ($booking) {
                factory(Passenger::class, 2)->create()->each(function ($pass) use ($booking) {
                    factory(Ticket::class)->create([
                        'booking_id' => $booking->id,
                        'passenger_id' => $pass->id,
                        'price' => $booking->amount,
                    ]);
                });
            });
        });
    }
}
