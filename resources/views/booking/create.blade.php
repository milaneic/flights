@extends('layouts.app2');
@section('content')
<div class="container">
    <h1>Flight number {{$flight->id}} from {{$flight->destination_from->name}} to {{$flight->destination_to->name}}</h1>
</div>
<div class="container">
    <div class="card bg-light justify-content-lg-between ">
        <div class="d-flex align-baseline">
            <div class="card-body">
                <h4>Start destination:</h4>
                <h5><strong>{{$flight->destination_from->name}}</strong></h5>
                <small>Name of airport: <a
                        href="{{route('airport.show',$flight->airport_from)}}">{{$flight->airport_from->name}}</a></small>
            </div>
            <div class="card-body">
                <h4>Departure time:</h4>
                <h5>{{\Carbon\Carbon::parse($flight->departure_time)->format('H:i d/m/Y')}}</h5>
            </div>
            <div class="card-body">
                <h4>Arrival time:</h4>
                <h5>{{\Carbon\Carbon::parse($flight->arrival_time)->format('H:i d/m/Y')}}</h5>
            </div>
            <div class="card-body">
                <h4>Final destination:</h4>
                <h5><strong>{{$flight->destination_to->name}}</strong></h5>
                <small>Name of airport: <a href="{{route('airport.show',$flight->airport_to)}}">
                        {{$flight->airport_to->name}}</a></small>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h1 class="mt-5">Book a flight</h1>
    <x-display-errors></x-display-errors>
    <form action="/booking/flight/{{$flight->id}}/passenger/{{$person}}" method='POST'>
        @csrf
        @method('POST')
        @for ($i = 0; $i < $person; $i++) <div class="card mt-5">
            <div class="card-body">
                <h4>Passenger #{{$i}}</h4>
                <div class="form-group d-flex mt-3">
                    <label for="first_name[]" class="w-20">First name:</label>
                    <input type="text" name="first_name[]" id="first_name[]" class="form-control">
                </div>

                <div class="form-group d-flex">
                    <label for="last_name[]">Last name:</label>
                    <input type="text" name="last_name[]" id="last_name[]" class="form-control">
                </div>
                <div class="form-group d-flex">
                    <label for="gender[]">Gender:</label>
                    <select name="gender[]" id="gender[]" class="form-control" style="width: 40%">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div>
                    <h4>Choose a seat</h4>
                    @php
                    $seats=json_decode($flight->seats_map);
                    @endphp*
                    <select name="seat[]" id="seat[]" class="form-control seat" style="width: 40%">
                        <option value="">Choose a seat or procede with a random seat</option>
                        @foreach ($seats as $seat)
                        @if ($seat->free==true)
                        <option value="{{$seat->id}}">{{$seat->seat}}</option>
                        @endif
                        @endforeach
                    </select>
                    <br>
                    <p>* If you do not choose a seat, seat will be assigned later during check-in</p>
                </div>
            </div>
</div>
@endfor
<input type="hidden" name="flight_id" value="{{$flight}}">
<button type="submit" class="btn btn-primary mt-5">Create a booking</button>

</form>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    </script>
@endsection