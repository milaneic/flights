@extends('layouts.app2')
@section('content')
{{-- old-content --}}
{{-- <h1 class="text-center mt-3">{{$destination->name}}</h1>
@if (count($destination->images)>0)
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 justify-content-center h-90">
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
        @endif
        <div class="card mt-5">
            <h5 class="card-tittle p-4">Description</h5>
            <div class="card-text bg-light p-5">
                {{$destination->description}}
            </div>
        </div>
    </div>
</div>
<div class="col-md-1"></div> --}}
{{-- end-old-content --}}

{{-- new-content --}}
<div class="destination_banner_wrap overlay">
    <div class="destination_text text-center">
        <h3>{{$destination->name}}</h3>
        <p>Informations about {{$destination->name}} in {{$destination->country->name}}</p>
    </div>
</div>

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
                <div class="bordered_1px"></div>
                <div class="contact_join">
                    <h3>Contact for information</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" placeholder="Phone no.">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single_input">
                                    <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn4" type="submit">submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- newletter_area_start  -->
<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                            <h4>Subscribe Our Newsletter</h4>
                            <p>Subscribe newsletter to get offers and about
                                new places to discover.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">
                                        <input type="email" placeholder="Your mail">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 " type="submit">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newletter_area_end  -->

<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>More Places</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @for ($i = 0; $i <count($flights); $i++) <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="{{asset('img/place/'.++$i.'.png')}}" alt="">
                        @php
                        --$i;
                        @endphp
                        <a href="#" class="prise">{{$flights[$i]->min_price}}</a>
                    </div>
                    <div class="place_info">
                        <a href="{{URL('/explore/search?destination1='.$flights[$i]->arrival_airport_id)}}">
                            <h3>{{$flights[$i]->destination_to->name}}</h3>
                        </a>
                        <p>{{$flights[$i]->destination_to->country->name}}</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">(20 Review)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endfor
    </div>
</div>
</div>

{{-- end-new-content --}}
@endsection