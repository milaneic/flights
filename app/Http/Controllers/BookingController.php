<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Flight;
use App\Passenger;
use App\Ticket;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Flight $flight, $person)
    {
        //
        //dd($person);
        return view('booking.create', ['flight' => $flight, 'person' => $person]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $flight = Flight::findOrFail($request['flight']);
        $seats = json_decode($flight->seats_map);
        foreach ($seats as $seat) {
            if ($seat->id == $request['seat']) {
                $seat->free = false;
            }
        }
        $flight->seats_map = json_encode($seats);
        $flight->save();
        //izmenjeno
        // dd($seats);
        $request->validate(
            [
                'first_name.*' => ['required', 'string', 'max:255'],
                'last_name.*' => ['required', 'string', 'max:255'],
                'gender.*' => ['required', 'in:male,female']
            ]
        );

        // dd($request->all());
        $first_names = $request['first_name'];
        $last_names = $request['last_name'];
        $gender = $request['gender'];
        $flight = Flight::findOrFail($request['flight']);
        $booking = Booking::create([
            'user_id' => 1,
            'flight_id' => $request['flight'],
            'amount' => $flight->min_price * $request['person'],
            'is_confirmed' => 0
        ]);
        for ($i = 0; $i < sizeof($first_names); $i++) {

            $passenger = Passenger::create([
                'first_name' => $first_names[$i],
                'last_name' => $last_names[$i],
                'gender' => $gender[$i],
                'document_type' => 'passport',
                'document_number' => 1
            ]);

            Ticket::create(
                [
                    'booking_id' => $booking->id,
                    'passenger_id' => $passenger->id,
                    'price' => $flight->min_price,
                    'seat' => 2
                ]
            );
            $flight->available_seats--;
            //update seat set false property seat 
            //pri kreiranju flight korpirati seat-map i capacity
            $flight->save();
            // return view()
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
        return view('booking.show', ['booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
