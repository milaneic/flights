<?php

use App\Booking;
use App\Passenger;
use App\Ticket;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Booking::class)->create();
    }
}
