@extends('layouts.app2')
@section('content')


{{-- new-content --}}
@if (count($destination->images)>0)
<div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel">
    <ol class="carousel-indicators">
        @for ($i = 0; $i < count($destination->images); $i++)
            @if ($i==0)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>

            @else
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
            @endif
            @endfor
    </ol>
    <div class="carousel-inner" style="height: 80%">
        @php
        $i=0;
        @endphp
        @foreach ($destination->images as $item)
        @if ($i==0)
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('storage/'.$item->url)}}" alt="First slide">
        </div>
        @php
        $i++;
        @endphp
        @else
        <div class="carousel-item">
            <img class="d-block w-100 " src="{{asset('storage/'.$item->url)}}" alt="First slide">
        </div>
        @endif
        @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@else
<div class="destination_banner_wrap overlay">
    <div class="destination_text text-center">
        <h3>{{$destination->name}}</h3>
        <p>Informations about {{$destination->name}} in {{$destination->country->name}}</p>
    </div>
</div>
@endif


<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    <h3>{{$destination->name}} in {{$destination->country->name}}</h3>
                    <h3>Description</h3>
                    {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words which don't look even slightly
                        believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                        anything embarrassing.</p>
                    <p>Variations of passages of lorem Ipsum available, but the majority have suffered alteration in
                        some form, by injected humour, or randomised words which don't look even slightly believable. If
                        you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                        embarrassing.</p> --}}
                    <p>{{$destination->description}}</p>
                    <div class="single_destination">
                        <h4>Informations about country</h4>
                        <p>Click on link under to view a informations about country...</p>
                        {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words.</p> --}}
                        <a href="{{route('country.show',$destination->country)}}"
                            class="genric-btn primary-border">{{$destination->country->name}}</a>
                    </div>
                    <div class="single_destination">
                        <h4>List of all airports:</h4>
                        <div class="">
                            <ol class="ordered-list">
                                @foreach ($destination->airports as $airport)
                                <li><span>{{$airport->name}}</span> <a href="{{route('airport.show',$airport)}}">here
                                        for more informations.</a></li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div class="single_destination">
                        <h4>Number of incoming flights</h4>
                        @php
                        $incoming=App\Flight::whereIn('arrival_airport_id',$destination->airports)->get();

                        if(Auth::check()){
                        $destinations=auth()->user()->country->destinations;
                        $airports=array();
                        foreach ($destinations as $d) {
                        foreach ($d->airports as $a) {
                        array_push($airports,$a->id);
                        }
                        }
                        $flights=App\Flight::whereIn("departure_airport_id",$airports)->inRandomOrder()->take(3)->get();
                        }else{
                        $flights=App\Flight::inRandomOrder()->take(3)->get();
                        }
                        @endphp
                        @if (count($incoming)>1)
                        <p>There are many variations of incoming flights exactly {{count($incoming)}} flights to
                            {{$destination->name}}. </p>
                        @else
                        There is {{count($incoming)}} flight to {{$destination->name}}.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection