@extends('layouts.app2');
@section('css')
<link rel="stylesheet" href="{{asset('css/flights.css')}}">
@endsection
@section('content')
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


{{-- end-of-new-content  --}} @endsection @section('scripts') <script src="{{asset('js/flights.js')}}">
</script>
@endsection