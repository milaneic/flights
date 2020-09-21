@extends('layouts.app2')
@section('content')
<div class="container">
    @if (isset($passenger))
    <article class="blog_item">
        <div class="blog_details">
            <h2>Check-in </h2>

            <hr>
            <form action="{{route('booking.check-store',[$booking,$i])}}" method="post">
                @csrf
                <x-display-errors></x-display-errors>
                <x-session-message></x-session-message>
                <input type="hidden" name="">
                <div class="mt-10">
                    <label for="name">Name:</label>
                    <input type="text" placeholder="Name" onfocus="this.placeholder = ''" s
                        onblur="this.placeholder = 'Name'" required class="single-input"
                        value="{{$passenger->first_name}} {{$passenger->last_name}}">
                </div>
                <div class="mt-10">
                    <label for="gender">Gender:</label>
                    <input type="text" placeholder="Gender" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Gender'" required class="single-input"
                        value="{{$passenger->gender}}">
                </div>
                <div class="mt-10">
                    <label for="document_type">Document type:</label>
                    <div class="form-select" id="default-select">
                        <select id="document_type" name="document_type">
                            <option value="passport">Passport</option>
                            <option value="card">Personal card</option>

                        </select>
                    </div>
                </div>
                <div class="mt-10">
                    <label for="document_number">Document number:</label>
                    <input type="text" name="document_number" id="document_number" placeholder="Document number:"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Document number'"
                        class="single-input">
                </div>

                <div class="mt-5">
                    <button type="submit" class="genric-btn primary">Check in a passenger</button>
                </div>
            </form>
        </div>
    </article>
    @else
    @php
    $ticket=$booking->tickets->first();
    $passenger=$ticket->passenger;
    @endphp
    <article class="blog_item">
        <div class="blog_details">
            <h2>Your data</h2>
            <hr>
            <form action="{{route('booking.check-store',[$booking,0])}}" method="post">
                @csrf
                <x-display-errors></x-display-errors>
                <x-session-message></x-session-message>
                <div class="mt-10">
                    <label for="name">Name:</label>
                    <input type="text" placeholder="Name" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Name'" required class="single-input"
                        value="{{$passenger->first_name}} {{$passenger->last_name}}">
                </div>
                <div class="mt-10">
                    <label for="gender">Gender:</label>
                    <input type="text" placeholder="Gender" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Gender'" required class="single-input"
                        value="{{$passenger->gender}}">
                </div>
                <div class="mt-10">
                    <label for="document_type">Document type:</label>
                    <div class="form-select" name='document_type' id="default-select">
                        <select id="document_type" name="document_type">
                            <option value="passport">Passport</option>
                            <option value="card">Personal card</option>

                        </select>
                    </div>
                </div>
                <div class="mt-10">
                    <label for="document_number">Document number:</label>
                    <input type="text" name="document_number" id="document_number" placeholder="Document number:"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Document number'"
                        class="single-input">
                </div>

                <div class="mt-5">
                    <button type="submit" class="genric-btn primary">Check in a passenger</button>
                </div>
            </form>
        </div>
    </article>
    @endif
</div>
@endsection