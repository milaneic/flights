@extends('layouts.app2')
@section('content')
<div class="container mb-5">
    <h1>{{$airport->name}}</h1>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" disabled value="{{$airport->name}}">
    </div>

    <div class="form-group">
        <label for="destination_id">Destination:</label>
        <input type="text" name="destination_id" id="" value="{{$airport->destination->name}}" disabled
            class="form-control">
    </div>
    <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" name="destination_id" id="" value="{{$airport->destination->country->name}}" disabled
            class="form-control">
    </div>
    @php
    $dt=\Carbon\Carbon::now();
    $flights=App\Flight::where('arrival_airport_id',$airport->id)->whereBetween('arrival_time',[$dt,$dt->endOfDay()])->limit(5)->get();
    @endphp
    @if (count($flights)>0)
    <h3 class="mt-5">Arrivings to this airport today:</h3>
    <div class="progress-table">
        <div class="table-head">
            <div class="serial">#</div>
            <div class="country">ARRIVING FROM:</div>
            <div class="country">ARRIVAL TIME:</div>
            <div class="country">AIRLINE COMPANY:</div>
        </div>

        @foreach ($flights as $flight)
        <div class="table-row">
            <div class="serial text-center">{{$flight->id}}</div>
            <div class="country text-center">{{$flight->destination_from->name}}</div>
            <div class="country text-center">{{\Carbon\Carbon::parse($flight->arrival_time)->format('H:i')}}</div>
            <div class="country text-center">{{$flight->airline_company->name}}</div>
        </div>
        @endforeach
    </div>
    @endif



    @php
    $flights2=App\Flight::where('departure_airport_id',$airport->id)->whereBetween('arrival_time',[$dt,$dt->endOfDay()])->limit(5)->get();
    @endphp
    @if (count($flights2)>0)
    <h3 class="mt-5">Deppartures from this airport today:</h3>
    <div class=" progress-table">
        <div class="table-head">
            <div class="serial">#</div>
            <div class="country">ARRIVING FROM:</div>
            <div class="country">ARRIVAL TIME:</div>
            <div class="country  ">AIRLINE COMPANY:</div>
        </div>
        @foreach ($flights2 as $flight2)
        <div class="table-row">
            <div class="serial">{{$flight2->id}}</div>
            <div class="country">{{$flight2->destination_from->name}}</div>
            <div class="country">{{\Carbon\Carbon::parse($flight2->departure_time)->format('H:i')}}</div>
            <div class="country">{{$flight2->airline_company->name}}</div>
        </div>

        @endforeach
    </div>
    @endif
    <a href="{{URL::previous()}}s" class="genric-btn primary-border mt-5">Go back</a>
</div>
@endsection