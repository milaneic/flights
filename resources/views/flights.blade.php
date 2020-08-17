@extends('layouts.app')
@section('content')
<h1>All flights</h1>
<br>
<br>
<table class="table table-dark">
    <thead>
        <tr>

        </tr>
        <th class="text-center">Redni broj</th>
        <th class="text-center">Vreme poletanja</th>
        <th class="text-center">Vreme sletanja</th>
        <th class="text-center">Polazni aerodrom</th>
        <th class="text-center">Polazni grad</th>
        <th class="text-center">Polazna drzava</th>
        <th class="text-center">Krajnji aerodrom</th>
        <th class="text-center">Krajnji grad</th>
        <th class="text-center">Krajnja drzava</th>
        <th class="text-center">Gate</th>
    </thead>
    <tbody>
        @php
        $i=0;
        @endphp
        @foreach ($flights as $item)
        <tr>
            <td class="text-center">{{++$i}}</td>
            <td class="text-center">{{$item->departure_time}}</td>
            <td class="text-center">{{$item->arrival_time}}</td>
            <td class="text-center">{{$item->airport_from->name}}</td>
            <td class="text-center">{{$item->airport_from->destination->name}}</td>
            <td class="text-center">{{$item->airport_from->destination->country->name}}</td>
            <td class="text-center">{{$item->airport_to->name}}</td>
            <td class="text-center">{{$item->airport_to->destination->name}}</td>
            <td class="text-center">{{$item->airport_to->destination->country->name}}</td>
            <td class="text-center">{{$item->gate}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection