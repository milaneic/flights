@extends('layouts.app2')
@section('content')

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>User account</h3>
                    <p>Welcome to your user account</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<div class="container">
    <x-session-message></x-session-message>
    <article class="blog_item">
        <div class="blog_details">
            <h2>Your data</h2>
            <hr>
            <label for="name">Name:</label>
            <div class="mt-10">
                <input type="text" name="name" id="name" placeholder="Name" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Name'" required class="single-input" value="{{$user->name}}">
            </div>
            <div class="mt-10">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Email'" required class="single-input" value="{{$user->email}}">
            </div>

            <div class="mt-10">
                <label for="country_id">Country:</label>
                <input type="text" name="country_id" id="country_id" placeholder="Country"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Country'" required class="single-input"
                    value="{{$user->country->name}}">
            </div>
            <div class="mt-10">
                <label for="role">Roles:</label>
                @foreach ($user->roles as $role)
                <input type="text" name="role" placeholder="Country" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Role'" required class="single-input" value="{{$role->name}}">
                @endforeach
            </div>
        </div>
    </article>
    <article class="blog_item">
        <div class="blog_details">
            <h2>Your bookings</h2>
            <hr class="mb-10">
            @if (count($user->bookings)>0)
            @php
            $now=\Carbon\Carbon::now();
            @endphp
            @foreach ($user->bookings as $booking)
            <div class="mt-10 d-flex justify-content-between">
                <p><strong>Booking #{{$booking->id}}</strong> from
                    <strong>{{$booking->flight->destination_from->name}}</strong> to
                    <strong>{{$booking->flight->destination_to->name}}</strong>
                </p>
                <div class="links">
                    @php
                    $date_departure=\Carbon\Carbon::parse($booking->flight->departure_time);
                    @endphp
                    @if ($booking->is_confirmed==0 && $date_departure->diffInDays($now)<2) <a
                        href="{{route('booking.check-in',$booking,$i=0)}}" class="genric-btn success-border">Check
                        in</a>
                        @endif
                        <a href="" class="genric-btn primary">Details</a>

                </div>
            </div>
            @endforeach
            @else
            <div class="mt-10">
                <h3 class="text-center">You dont have any booking</h3>
            </div>
            @endif
        </div>
    </article>

    {{-- <div class="card mw-60 mt-5">
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
@endif --}}

</div>
@endsection