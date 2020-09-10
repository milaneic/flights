@extends('layouts.app2')
@section('content')
<div class="container mb-5">
    <h1>Booking details</h1>

    <div class="card mt-3 mb-5">
        <div class="card-body bg-light-grey mt-3">
            <div class="row">
                <div class="col-md-5 text-center">
                    <h5>{{$booking->flight->destination_from  ->name}}</h5>
                    <small>{{$booking->flight->departure_time}}</small><br>
                    <a
                        href="{{route('airports.show',$booking->flight->airport_from->id)}}">{{$booking->flight->airport_from->name}}</a>
                </div>
                <div class=" col-md-2 text-center">
                    <strong><i class="fas fa-plane fa-3x"></i></strong>

                </div>
                <div class="col-md-5 text-center">
                    <h5>{{$booking->flight->destination_to->name}}</h5>
                    <small>{{$booking->flight->arrival_time}}</small><br>
                    <a
                        href="{{route('airports.show',$booking->flight->airport_to->id)}}">{{$booking->flight->airport_to->name}}</a>
                </div>
            </div>
        </div>
    </div>
    <h2 class="mt-5">All passengers</h2>
    <p class="mb-5">Number of tickets for this booking: {{count($booking->tickets)}}</p>
    <div id="accordion mt-5">
        @foreach ($booking->tickets as $ticket)
        <div class="card">
            <div class="card-header" id="heading{{$ticket->id}}">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$ticket->id}}"
                        aria-expanded="true" aria-controls="collapse{{$ticket->id}}">
                        Booking number {{$ticket->id}}
                    </button>
                </h5>
            </div>

            <div id="collapse{{$ticket->id}}" class="collapse" aria-labelledby="heading{{$ticket->id}}"
                data-parent="#accordion">
                <div class="card-body bg-light-grey p-3">
                    @php
                    $p=$ticket->passenger;
                    @endphp
                    <h5 class="mb-3">Ticket:</h5>
                    <div class="p-4">
                        <p style="font-size:18px">Ticket id: {{$ticket->id}}</p>
                        <p style="font-size:18px">Amount: {{$ticket->price}} euro</p>
                        <p style="font-size:18px">Seat number: {{$ticket->getSeat($ticket->seat)}}</p>
                    </div>
                    <hr>
                    <h5>Passenger data:</h5>
                    <div class="p-4">
                        <p style="font-size:18px">First name: {{$p->first_name}}</p>
                        <p style="font-size:18px">Last name: {{$p->last_name}}</p>
                        <p style="font-size:18px">Gender: {{ucFirst(trans($p->gender))}}</p>
                        <p style="font-size:18px">Document type: {{ucFirst(trans($p->document_type))}}</p>
                        <p style="font-size:18px">Document number: {{$p->document_number}}</p>
                    </div>
                    <div class="text-right">
                        <p style="font-size:18px">Wrong data for passenger change it..</p>
                        <a href="{{route('passenger.edit',$p)}}" class="btn btn-primary">Edit a passenger</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection