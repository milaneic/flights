@extends('layouts.app')
@section('content')

<div class="container">
    <ul class="list-group">
        @foreach ($booking as $item)
        <li class="list-group-item">Booking: {{$item->id}}</li>
        @if (count($item->tickets)>0)
        <ul class="list-group">
            <h4 class="text-center">Lista svih karata za booking broj: {{$item->id}} </h4>
            @foreach ($item->tickets as $item2)
            <li class="list-group-item">Sediste: {{$item2->seat}}</li>
            <ul class="list-group">
                <li class="list-group-item">Ime putnika: <strong>{{$item2->passenger->first_name}}</strong></li>
                <li class="list-group-item">Prezime putnika: <strong>{{$item2->passenger->last_name}}</strong></li>
                <li class="list-group-item">Pol putnika: <strong>{{$item2->passenger->gender}}</strong></li>
                <li class="list-group-item">Vrsta dokumenta: <strong>{{$item2->passenger->document_type}}</strong></li>
                <li class="list-group-item">Vrsta dokumenta: <strong>{{$item2->passenger->document_number}}</strong>
                </li>
            </ul>
            @endforeach
        </ul>
        @endif
        <br>
        @endforeach
    </ul>
</div>

@endsection