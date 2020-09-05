@extends('layouts.app')
@section('content')
<h1 class="p-4">Searched flights</h1>
<div class="container-fluid">
    <table class="table table-borderless mt-5 mb-5" id="myTable">
        <thead>
            <tr>
                {{-- <td class="text-center">#</td> --}}
                <td class="text-center">Destination from</td>
                <td class="text-center">Destination to</td>
                <td class="text-center">Time od departure</td>
                <td class="text-center">Time of arrival</td>
                <td class="text-center">Price</td>
                <td class="text-center">Book a flight</td>
            </tr>
        </thead>
        @php
        $i=0;
        @endphp
        <tbody>
            @if ($flights->count()>0)
            @foreach ($flights as $flight)
            <tr class="from={{Str::lower($flight->destination_from->name)}}
                to={{Str::lower($flight->destination_to->name)}} flights">
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$flight->destination_from->name}}</td>
                <td class="text-center">{{$flight->destination_to->name}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($flight->departure_time)->format('H:i d/m/Y')}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($flight->arrival_time)->format('H:i d/m/Y')}}</td>
                <td class="text-center">{{$flight->min_price}}</td>
                <td class="text-center"><a href="/booking/create/{{$flight->id}}/person/{{$person}}">Book a
                        flight</a>
                </td>
                <td class="d-none">{{\Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d')}}</td>
                <td class="d-none">{{\Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d')}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="7">
                    <h3>There is no flight for serched direction...</h3>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection