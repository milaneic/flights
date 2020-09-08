@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center">
        Choose a baggage
    </h1>
    <div id="accordion" class="mt-5">
        <form action="{{route('booking.make',$booking)}}" method="POST">
            @csrf
            @php
            $i=1;
            @endphp
            @foreach ($booking->tickets as $ticket)
            @php
            $passenger=$ticket->passenger;
            $company=$booking->flight->airline_company;
            @endphp
            @if ($i==1)
            <div class="card">
                <div class="card-header" id="heading{{$i}}">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$i}}"
                            aria-expanded="true" aria-controls="collapse{{$i}}">
                            Passenger #{{$i}}
                        </button>
                    </h2>
                </div>

                <div id="collapse{{$i}}" class="collapse show" aria-labelledby="heading{{$i++}}"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        <p style="font-size: 20px">
                            Passenger first name: {{$passenger->first_name}}
                        </p>
                        <div class="baggages">

                            @for ($i = 1; $i < count($company->baggage_policies); $i++)
                                @php
                                $policies=$company->baggage_policies[$i];
                                $baggage=$policies->baggage;
                                @endphp
                                <div class="card mt-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$baggage->type}}</h5>
                                                <h6>Description</h6>
                                                <p>{{$baggage->description}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4  m-auto">
                                            <div class="content" style="position: relative;top: 50%;">
                                                <p>Amount:</p>
                                                <input type="number" name="{{$baggage->type}}[]"
                                                    id="{{$baggage->type}}[]" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-header" id="heading{{$i}}">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapseTwo">
                            Passenger #{{$i}}
                        </button>
                    </h2>
                </div>
                <div id="collapse{{$i}}" class="collapse show" aria-labelledby="heading{{$i++}}"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        <p style="font-size: 20px">
                            Passenger first name: {{$passenger->first_name}}
                        </p>
                        <div class="baggages">
                            @foreach ($company->baggage_policies as $policies)
                            @php
                            $baggage=$policies->baggage;
                            @endphp
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$baggage->type}}</h5>
                                            <h6>Description</h6>
                                            <p>{{$baggage->description}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4  m-auto">
                                        <div class="content" style="position: relative;top: 50%;">
                                            <p>Amount:</p>
                                            <input type="number" name="{{$baggage->type}}[]" id="{{$baggage->type}}[]"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            <button class="btn btn-primary mt-5">Add a baggages</button>
        </form>
    </div>
</div>
@endsection