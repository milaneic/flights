<?php

namespace App\Http\Controllers;

use App\Baggage;
use App\BaggageBooking;
use App\BaggagePolicy;
use App\Booking;
use App\Flight;
use App\Passenger;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $flight_free_seats = json_decode($flight->seats_map);
        $seats = $request['seat'];
        foreach ($flight_free_seats as $free_seat) {
            for ($i = 0; $i < count($seats); $i++) {
                if ($free_seat->id == $seats[$i]) {
                    $free_seat->free = false;
                }
            }
        }
        //  
        $flight->seats_map = json_encode($flight_free_seats);
        $flight->save();


        $request->validate(
            [
                'first_name.*' => ['required', 'string', 'max:255'],
                'last_name.*' => ['required', 'string', 'max:255'],
                'gender.*' => ['required', 'in:male,female'],
                'seat.*' => ['nullable', 'distinct']
            ]
        );

        // dd($request->all());
        $first_names = $request['first_name'];
        $last_names = $request['last_name'];
        $gender = $request['gender'];
        $flight = Flight::findOrFail($request['flight']);
        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'flight_id' => $request['flight'],
            'amount' => $flight->min_price * $request['person'],
            'is_confirmed' => 0
        ]);

        $passenger = array();
        for ($i = 0; $i < sizeof($first_names); $i++) {

            $pass = Passenger::create([
                'first_name' => $first_names[$i],
                'last_name' => $last_names[$i],
                'gender' => $gender[$i],
                'document_type' => 'passport',
                'document_number' => 1
            ]);
            array_push($passenger, $pass);
            Ticket::create(
                [
                    'booking_id' => $booking->id,
                    'passenger_id' => $pass->id,
                    'price' => $flight->min_price,
                    'seat' => $seats[$i]
                ]
            );
            $flight->available_seats--;
            //update seat set false property seat 
            //pri kreiranju flight korpirati seat-map i capacity
            $flight->updatePrice();
            $flight->save();
        }

        return redirect()->route('booking.baggage', ['booking' => $booking, 'flight' => $flight]);
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

    public function baggage(Booking $booking, Flight $flight)
    {

        return view('booking.baggage', ['booking' => $booking, 'flight' => $flight]);
    }

    public function make(Request $request, Booking $booking)
    {
        //$free = $request['Free_handed_luggage'];
        $troley = $request['Trolley_bag'];
        $small = $request['Small_check-in'];
        $medium = $request['Medium_check-in'];
        $big = $request['Big_check-in'];

        $allbags = array();
        //array_push($bags, $free);
        array_push($allbags, $troley);
        array_push($allbags, $small);
        array_push($allbags, $medium);
        array_push($allbags, $big);

        //dd($b = Baggage::find($i));

        $company = $booking->flight->airline_company;
        $policy = $company->baggage_policies;
        $total = 0;
        DB::table('baggage_booking')->insert(['booking_id' => $booking->id, 'baggage_id' => 1, 'quantity' => count($booking->tickets)]);
        //BaggageBooking::create(['booking_id' => $booking->id, 'baggage_id' => 1, 'quantity' => count($booking->tickets)]);
        for ($i = 0; $i < count($allbags); $i++) {
            $sum = 0;
            foreach ($allbags[$i] as $specific_bag_type) {
                $sum += $specific_bag_type;
            }
            if ($sum != 0) {
                echo $i;
                $i += 2;
                DB::table('baggage_booking')->insert(['booking_id' => $booking->id, 'baggage_id' => $i, 'quantity' => $sum]);
                //BaggageBooking::create(['booking_id' => $booking->id, 'baggage_id' => $i + 2, 'quantity' => $sum]);
                echo $i;
                $i -= 2;
            }
        }
        // $booking->amount += $total;
    }
}
