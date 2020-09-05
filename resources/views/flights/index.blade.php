@extends('layouts.app');
@section('css')
<link rel="stylesheet" href="{{asset('css/flights.css')}}">
@endsection
@section('content')
<h1 class="text-center">All flights</h1>
<div class="container-fluid">
    <form action="{{route('flight.search')}}" method="get">
        <div class="container d-flex justify-content-around  margin-auto mt-5 mb-5">
            <div class="card bg-light p-4">

                <label for="destination1"><span><i class="fas fa-plane-departure"></i></span> Destination from:</label>
                <input type="text" name="destination1" id="destination1" class="form-control">
            </div>
            <div class="card bg-light p-4">
                <label for=" destination2"><i class="fas fa-plane-arrival"></i> Arrival to:</label>
                <input type="text" name="destination2" id="destination2" class="form-control">
            </div>
            <div class="card bg-light p-4">
                <label for="destination1"><i class="far fa-calendar-alt"></i> Departure date:</label>
                <input type="date" name="date1" id="departure_date" class="form-control">
            </div>
            <div class="card bg-light p-4">
                <label for="destination1"><i class="far fa-calendar-alt"></i> Arrival date:</label>
                <input type="date" name="date2" id="arival_date" class="form-control">
            </div>
            <div class="card bg-light p-4">
                <label for=""> <i class="fas fa-user"></i> Persons:</label>
                <input type="number" name="person" id="" value="1" class="form-control">
            </div>
            <button class="btn btn-success" onclick="search()">Search</button>
        </div>
    </form>
</div>
<div class="container mw-100">
    {{-- <table class="table table-borderless mt-5 mb-5" id="myTable">
        <thead>
            <tr>
                {{-- <td class="text-center">#</td> --}}
    {{-- <td class="text-center">Destination from</td>
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
            @foreach ($flights as $flight)
            <tr
                class="from={{Str::lower($flight->destination_from->name)}}
    to={{Str::lower($flight->destination_to->name)}} flights">
    {{-- <td class="text-center">{{++$i}}</td> --}}
    {{-- <td class="text-center">{{$flight->destination_from->name}}</td>
    <td class="text-center">{{$flight->destination_to->name}}</td>
    <td class="text-center">{{\Carbon\Carbon::parse($flight->departure_time)->format('H:i d/m/Y')}}</td>
    <td class="text-center">{{\Carbon\Carbon::parse($flight->arrival_time)->format('H:i d/m/Y')}}</td>
    <td class="text-center">{{$flight->min_price}}</td>
    <td class="text-center"><a href="">Book a flight</a></td>
    <td class="d-none">{{\Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d')}}</td>
    <td class="d-none">{{\Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d')}}</td>
    </tr>
    @endforeach
    </tbody>
    </table> --}}
    <h1>Flights destinations</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{url('storage/img/cover1.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Amsterdam</h3>
                    <p>Experience amsterdam...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{url('storage/img/cover2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{url('storage/img/cover3.jpg')}}" alt="Third slide">
            </div>
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
</div>
{{-- 
Gallery --}}

<div class="row mt-5">
    <h1 class="text-center">Our Gallery</h1>
    <div class="col-md-12">

        <div id="mdb-lightbox-ui"></div>

        <div class="mdb-lightbox no-margin">

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(117).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(117).jpg"
                        class="img-fluid">
                </a>
            </figure>

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(98).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg"
                        class="img-fluid" />
                </a>
            </figure>

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(131).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(131).jpg"
                        class="img-fluid" />
                </a>
            </figure>

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(123).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(123).jpg"
                        class="img-fluid" />
                </a>
            </figure>

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(118).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(118).jpg"
                        class="img-fluid" />
                </a>
            </figure>

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(128).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(128).jpg"
                        class="img-fluid" />
                </a>
            </figure>

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(132).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(132).jpg"
                        class="img-fluid" />
                </a>
            </figure>

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(115).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(115).jpg"
                        class="img-fluid" />
                </a>
            </figure>

            <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(133).jpg"
                    data-size="1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(133).jpg"
                        class="img-fluid" />
                </a>
            </figure>

        </div>

    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('js/flights.js')}}"></script>
@endsection