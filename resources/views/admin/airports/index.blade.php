{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <h1>All airports</h1>

    <h4 class="mt-5"><a href="{{route('airports.create')}}">Create a new airport</a></h4>
<table class="table table-striped">
    <thead>
        <tr>
            <td class="text-center">Redni broj:</td>
            <td class="text-center">Name:</td>
            <td class="text-center">Destination:</td>
            <td class="text-center">Details:</td>
        </tr>
    </thead>
    <tbody>
        @php
        $i=0;
        @endphp
        @foreach ($airports as $airport)
        <tr>
            <td class="text-center">{{++$i}}</td>
            <td class="text-center">{{$airport->name}}</td>
            <td class="text-center">{{$airport->destination->name}}</td>
            <td class="text-center"><a href="{{route('airports.edit',$airport)}}">Detalji</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection --}}
<x-admin-master>
    @section('content')
    <h1>All airports</h1>

    <h4 class="mt-5"><a href="{{route('airports.create')}}">Create a new airport</a></h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">#</td>
                <td class="text-center">Name:</td>
                <td class="text-center">Destination:</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($airports as $airport)
            <tr>
                <td class="text-center">{{$airport->id}}</td>
                <td class="text-center">{{$airport->name}}</td>
                <td class="text-center">{{$airport->destination->name}}</td>
                <td class="text-center"><a href="{{route('airports.edit',$airport)}}">Detalji</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <ul class="text-center">{{$airports->links()}}</ul>
    @endsection
</x-admin-master>