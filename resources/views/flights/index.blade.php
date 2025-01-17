@extends('layouts.app2');
@section('css')
<link rel="stylesheet" href="{{asset('css/flights.css')}}">
@endsection
@section('content')

{{-- start-of-content --}}
{{-- old-content  --}}

{{-- <h1 class="text-center">All flights</h1>
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
</div> --}}
{{-- 
Gallery --}}

{{-- <div class="row mt-5">
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
</div> --}}

{{-- end-of-old-content  --}}

{{-- new-content  --}}
<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Indonesia</h3>
                            <p>Fly and visit a beautiful Indonesia...</p>
                            <a href="{{URL('countries/102')}}" class="boxed-btn3">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Australia</h3>
                            <p>Pixel perfect design with awesome contents</p>
                            <a href="{{URL('countries/14')}}" class="boxed-btn3">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Switzerland</h3>
                            <p>Pixel perfect design with awesome contents</p>
                            <a href="{{URL('countries/211')}}" class="boxed-btn3">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- slider_area_end -->

<!-- where_togo_area_start  -->
<div class="where_togo_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 mb-5">
                <h2 style="color: #fff;    font-family: 'Nothing You Could Do', cursive;" class="text-center">Search a
                    flight</h2>
                <x-display-errors></x-display-errors>
            </div>

            <div class="col-lg-12">
                <div class="search_wrap">
                    <form class="search_form" action="{{route('flight.search')}}">
                        <div class="input_field">
                            <input type="text" placeholder="Destination from" name="destination1">
                        </div>
                        <div class="input_field">
                            <input type="text" placeholder="Destination to" name="destination2">
                        </div>
                        <div class="input_field">
                            <input id="datepicker" placeholder="Date" name="date">
                        </div>
                        <div class="input_field">
                            <input type="number" name="person" id="person" value="1" min="1" max="5"
                                placeholder="Number of persons">
                        </div>

                        <div class="search_btn">
                            <button class="boxed-btn4 " type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- where_togo_area_end  -->

<!-- popular_destination_area_start  -->
<div class="popular_destination_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Popular Destination</h3>
                    <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit
                        hella wolf moon beard words.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="{{asset('img/destination/1.png')}}" alt="">
                    </div>
                    @php
                    $italy=DB::table('destinations')->where('country_id',108)->get();
                    $brazil=DB::table('destinations')->where('country_id',31)->get();
                    $usa=DB::table('destinations')->where('country_id',231)->get();
                    $nepal=DB::table('destinations')->where('country_id',154)->get();
                    $maldives=DB::table('destinations')->where('country_id',134)->get();
                    $indonesia=DB::table('destinations')->where('country_id',102)->get();
                    @endphp
                    <div class="content">
                        <p class="d-flex align-items-center">Italy <a href="{{URL('/countries/108')}}">
                                {{count($italy)}} Places</a>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="{{asset('img/destination/2.png')}}" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Brazil <a href="{{URL('/countries/31')}}">
                                {{count($brazil)}} Places</a>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="img/destination/3.png" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">America <a href="{{URL('/countries/31')}}"> {{count($usa)}}
                                Places</a> </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="{{asset('img/destination/4.png')}}" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Nepal <a href="{{URL('/countries/154')}}">
                                {{count($nepal)}} Places</a>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="{{asset('img/destination/5.png')}}" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Maldives <a href="{{URL('/countries/134')}}">
                                {{count($maldives)}}
                                Places</a> </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="{{asset('img/destination/6.png')}}" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Indonesia <a href="{{URL('/countries/102')}}">
                                {{count($indonesia)}}
                                Places</a> </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_destination_area_end  -->

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
                    <h3>Popular Places</h3>
                    <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit
                        hella wolf moon beard words.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/1.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>California</h3>
                        </a>
                        <p>United State of America</p>
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
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/2.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>Korola Megna</h3>
                        </a>
                        <p>United State of America</p>
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
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/3.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>London</h3>
                        </a>
                        <p>United State of America</p>
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
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/4.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>Miami Beach</h3>
                        </a>
                        <p>United State of America</p>
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
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/5.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>California</h3>
                        </a>
                        <p>United State of America</p>
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
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/6.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>Saintmartine Iceland</h3>
                        </a>
                        <p>United State of America</p>
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
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="more_place_btn text-center">
                    <a class="boxed-btn4" href="#">More Places</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="video_area video_bg overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video_wrap text-center">
                    <h3>Enjoy Video</h3>
                    <div class="video_icon">
                        <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="travel_variation_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="img/svg_icon/1.svg" alt="">
                    </div>
                    <h3>Comfortable Journey</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="img/svg_icon/2.svg" alt="">
                    </div>
                    <h3>Luxuries Hotel</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="img/svg_icon/3.svg" alt="">
                    </div>
                    <h3>Travel Guide</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- testimonial_area  -->
<div class="testimonial_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                        programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Micky Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                        programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Tom Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                        programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Jerry Mouse</h3>
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
<!-- /testimonial_area  -->


<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Recent Trips</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="img/trip/1.png" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="img/trip/2.png" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="img/trip/3.png" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end-of-new-content  --}}

@endsection
@section('scripts')
<script src="{{asset('js/flights.js')}}"></script>
@endsection