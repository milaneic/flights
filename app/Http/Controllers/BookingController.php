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
        if ($flight->available_seats > $person) {
            return view('booking.create', ['flight' => $flight, 'person' => $person]);
        } else {
            session()->flash('message2', 'There is no that much space on plain. Number of available seats is' . $flight->available_seats);
            return back();
        }
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
        // $request->validate(
        //     [
        //         'first_name.*' => ['required', 'string', 'max:255'],
        //         'last_name.*' => ['required', 'string', 'max:255'],
        //         'gender.*' => ['required', 'in:male,female'],
        //         'seat.*' => ['nullable', 'distinct']
        //     ]
        // );

        try {

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




            //dd($request->all());
            $first_names = $request['first_name'];
            $last_names = $request['last_name'];
            $gender = $request['gender'];
            $flight = Flight::findOrFail($request['flight']);
            $booking = Booking::create([
                'user_id' => auth()->user()->id,
                'flight_id' => $request['flight'],
                'amount' => $flight->min_price * count($request['first_name']),
                'is_confirmed' => 0
            ]);

            $passenger = array();
            for ($i = 0; $i < sizeof($first_names); $i++) {

                $pass = Passenger::create([
                    'first_name' => $first_names[$i],
                    'last_name' => $last_names[$i],
                    'gender' => $gender[$i],
                    'document_type' => null,
                    'document_number' => null
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
        } catch (\Throwable $th) {
            session()->flash('message', 'Reservation cannot be completed!');
            session()->flash('alert-class', 'alert-danger');
            return back();
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
        // dd($booking->tickets);
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
        $request->validate([
            'Trolley_bag.*' => ['required', 'gt:-1'],
            'Small_check-in.*' => ['required', 'gt:-1'],
            'Medium_check-in.*' => ['required', 'gt:-1'],
            'Big_check-in.*' => ['required', 'gt:-1'],
        ]);
        try {

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
            DB::table('baggage_booking')->insert(['booking_id' => $booking->id, 'baggage_id' => 1, 'quantity' => count($booking->tickets), 'created_at' => now(), 'updated_at' => now()]);
            for ($i = 0; $i < count($allbags); $i++) {
                $sum = 0;
                foreach ($allbags[$i] as $specific_bag_type) {
                    $sum += $specific_bag_type;
                }
                if ($sum != 0) {
                    $i += 2;
                    DB::table('baggage_booking')->insert(['booking_id' => $booking->id, 'baggage_id' => $i, 'quantity' => $sum, 'created_at' => now(), 'updated_at' => now()]);
                    $current_policy = DB::table('baggage_policies')->where([['baggage_id', $i], ['airline_company_id', $company->id]])->first();
                    $total += $sum * (int)$current_policy->price;
                    $i -= 2;
                }
            }

            $booking->amount += $total;
            $booking->save();
            return redirect()->route('user.show', auth()->user()->id);
        } catch (\Throwable $th) {
            session()->flash('message', 'Baggage reservation cannot be completed!');
            session()->flash('alert-class', 'alert-danger');
        }
    }

    public function check_in(Booking $booking, $i = null)
    {
        if ($i != null) {
            $ticket = $booking->tickets->get($i);
            return view('booking.check-in', ['booking' => $booking, 'passenger' => $ticket->passenger, 'i' => $i]);
        } else {
            return view('booking.check-in', ['booking' => $booking]);
        }
    }

    public function check_store(Booking $booking, Request $request, $i = null)
    {
        $data = $request->validate([
            'document_type' => ['in:passport,card'],
            'document_number' => ['required', 'numeric', 'digits:13']
        ]);

        try {

            if ($i == count($booking->tickets) - 1) {
                $ticket = $booking->tickets->get($i);
                // if ($ticket->seat == null) {
                //     $allSeats = json_decode($booking->flight->seats_map);
                //     $freeseat = array();
                //     for ($i = 0; $i < sizeof($allSeats); $i++) {
                //         if ($allSeats[$i]->free == true) {
                //         }
                //     }
                // }
                $passenger = $ticket->passenger;
                $passenger->update($data);
                $booking->is_confirmed = 1;
                $booking->save();
                session()->flash('message', 'You have succsessfuly checked-in!!!');
                return redirect()->route('user.show', auth()->user()->id);
            } else {
                $ticket = $booking->tickets->get($i);
                $passenger = $ticket->passenger;
                // dd($passenger);
                $passenger->update($data);
                return redirect()->route('booking.check-in', [$booking, ++$i]);
            }
        } catch (\Throwable $th) {
            session()->flash('message', 'Check-in cannot be completed!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }
}
