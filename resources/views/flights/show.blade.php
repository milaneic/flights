@extends('layouts.app');
@section('content')
<div class="container">
    <h1>Flight number {{$flight->id}} from {{$flight->destination_from->name}} to {{$flight->destination_to->name}}</h1>
</div>
<div class="container-fluid">
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
                <small>Name of airport: {{$flight->airport_to->name}}</a></small>
            </div>

        </div>
    </div>
</div>
@endsection