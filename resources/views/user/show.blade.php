@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="text-center">Welcome {{$user->name}}</h1>

    <div class="card mw-60 mt-5">
        <div class="card-body">
            <h5>Your data:</h5>
            <div class="card-text mt-3 p-3">
                <p>Name: {{$user->name}}</p>
                <p>Email: {{$user->email}}</p>
                <p>Your roles:</p>
                <ul class="list-group list-group-flush">
                    @foreach ($user->roles as $item)
                    <li class="list-group-item">{{$item->name}}</li>
                    @endforeach
                </ul>
                <div class="text-right">
                    <p>You wish to change your personal data?</p>
                    <span> <a href="{{route('users.edit',$user)}}" class="btn btn-primary">Edit a data</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <h1 class="text-center mt-3">Your bookings</h1>
    @php
    $i=0;
    @endphp
    @if (count($bookings)>0)

    <table class="table table-dark">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">From:</th>
                <th class="text-center">To:</th>
                <th class="text-center">Created at:</th>
                <th class="text-center">Details:</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($bookings as $item)
            <tr>
                <td class="text-center">{{$i++}}</td>
                <td class="text-center">{{$item->flight->destination_from->name}}</td>
                <td class="text-center">{{$item->flight->destination_to->name}}</td>
                <td class="text-center">{{$item->created_at->format('H:i d:m:Y')}}</td>
                <td class="text-center"><a href="{{route('booking.show',$item)}}">Booking</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="card mt-5 w-60">
        <div class="card-body">
            <h3 class="text-center">You dont have yet any booked flight...</h3>
        </div>
    </div>
    @endif

</div>
@endsection