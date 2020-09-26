@extends('layouts.app2')
@section('content')
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
                            <input type="text" placeholder="Destination from" id="destination1" name="destination1"
                                value="{{$request['destination1']}}">
                        </div>
                        <div class="input_field">
                            <input type="text" placeholder="Destination to" id="destination2" name="destination2"
                                value="{{$request['destination2'] ?? ''}}">
                        </div>
                        <div class="input_field">
                            <input id="datepicker" placeholder="Date" name="date" id="date"
                                value="{{$request['date'] ?? ''}}">
                        </div>
                        <div class="input_field">
                            <input type="number" name="person" id="person" value="{{$request['person'] ?? ''}}" min="1"
                                max="5" placeholder="Number of persons">
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


{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-2 mt-3">
            <h3>Filter Result</h3>
            <form action="{{route('flight.filter')}}" method="POST">
@csrf
<input type="hidden" name="flights" value="{{json_encode($flights)}}">
<input type="hidden" name="destination1" id="d1">
<input type="hidden" name="destionation2" id="d2">
<input type="hidden" name="date" id="d">
<input type="hidden" name="person" id="p">
<div class="price-range">
    <h5>Price range:</h5>
    <div id="slider"></div>
    <input type="hidden" name="min_price" id='min_price' value="{{$flights->min('min_price')}}">
    <input type="hidden" name="max_price" id="max_price" value="{{$flights->max('min_price')}}">
    <p class="text-center" id="amount"></p>
</div>
<div class="airlines">
    <div class="title">
        <h5>Airlines</h5>
    </div>
    <hr>
    <div class="airlines p-2">
        @foreach (App\AirlineCompany::all() as $item)
        <input type="checkbox" name="company[]" id="{{$item->name}}" value="{{$item->id}}">
        {{$item->name}}
        <br>
        @endforeach
    </div>
</div>
<div class="reset_btn">
    <button class="boxed-btn4" id="filter" type="submit">Search</button>
</div>
</form>
</div>
<div class="col-md-10">
    @foreach ($flights as $flight)
    <div class="flight-container border-top  d-flex justify-content-between bg-light align-items-center"
        style="height:150px">
        <div class="box d-flex justify-content-between align-items-baseline" style="flex:2">
            <div class="from">
                <h3>{{$flight->destination_from->name}}</h3>
                <h4>{{\Carbon\Carbon::parse($flight->departure_time)->format('d-m-Y H:i')}}</h4>
            </div>
            <div class="font">
                <i class="fas fa-plane"></i>
                @php
                $arrival=Carbon\Carbon::parse($flight->arrival_time);
                $departure=Carbon\Carbon::parse($flight->departure_time);
                $diff=$departure->diffInSeconds($arrival);
                @endphp
                <h4>{{gmdate('H:i',$diff)}}</h4>
            </div>
            <div class="to">
                <h3>{{$flight->destination_to->name}}</h3>
                <h4>{{\Carbon\Carbon::parse($flight->arrival_time)->format('dD-m-Y H:i')}}</h4>
            </div>
        </div>
        <div class="box2 border-left" style="flex:0.5;">
            <div class="text-center mb-4">{{$flight->min_price* $request['person']}}</div>
            <div class="text-center"><a href="{{route('booking.create',[$flight,$request['person']])}}"
                    class="genric-btn primary-border">Book</a></div>
        </div>
    </div>
    @endforeach
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="" style="margin:auto">
                <span class="text-center" style="margin: auto"> {{ $flights->links() }}</span>
            </div>
        </div>
    </div>
</div>
</div>
</div> --}}
@if ($result !=null && count($result)>0)
<hr class="mt-5">
<div class="row mb-3">
    <div class="col-md-2 m-3">

        @csrf
        @php
        $ids=[];
        foreach ($result as $flights) {
        array_push($ids,$flights->id);
        }
        @endphp
        {{-- <input type="hidden" name="destination1" id="destination">
        <input type="textw" name="date" id="date2"> --}}
        <input type="hidden" name="result" id="ids" value="{{json_encode($ids)}}">
        <h3>Filter:</h3>
        <hr>
        <div class="price-range">
            <h5>Price range:</h5>
            <div id="slider"></div>
            <input type="hidden" name="min_price" id='min_price' value="{{$result->min('min_price')}}">
            <input type="hidden" name="max_price" id="max_price" value="{{$result->max('min_price')}}">
            <p class="text-center" id="amount"></p>
        </div>
        <div class="airlines">
            <div class="title">
                <h5>Airlines</h5>
            </div>
            <hr>
            <div class="airlines p-2 mb-3">
                @foreach (App\AirlineCompany::all() as $item)
                <input type="checkbox" class="company" name="company" id="{{$item->name}}" value="{{$item->id}}">
                {{$item->name}}
                <br>
                @endforeach
                <input type="hidden" id="companies">
            </div>
        </div>
        <div class="text-center"><button type="submit" id="filterit" class="boxed-btn4">Filter</button></div>
    </div>
    <div class="col-md-8">


        <h2 class="text-center">Searched flights</h2>
        <x-session-message></x-session-message>
        <div id="result">
            @foreach ($result as $item)
            <div class="card mt-3">
                <div class="card-body d-flex">
                    <div class="box1 border-right" style="flex: 2">
                        <div class="first-row d-flex justify-content-around align-items-baseline">
                            <div class="details1">
                                <div class="time">
                                    <h3 class="card-tittle">{{$item->destination_to->name}}</h3>
                                    <h4>{{\Carbon\Carbon::parse($item->departure_time)->format('H:i')}} -
                                        {{\Carbon\Carbon::parse($item->arrival_time)->format('H:i')}}</h4>
                                </div>
                                <div class="company">
                                    <p>{{$item->airline_company->name}}</p>
                                </div>
                            </div>
                            <div class="details2">
                                <h4>NO STOPS</h4>
                            </div>
                            <div class="details3">
                                @php
                                $time_departure=\Carbon\Carbon::parse($item->departure_time);
                                $time_arrival=\Carbon\Carbon::parse($item->arrival_time);
                                $flight_duration=$time_departure->diff($time_arrival)->format('%hh%im');
                                @endphp
                                <h4>{{$flight_duration}}</h4>
                                <p>{{$item->airport_from->ident}} - {{$item->airport_to->ident}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="box2" style="width:20%">
                        <div class="price border-bottom" style="height: 60%">
                            <h4 class="text-center" style="margin: auto">{{$item->min_price}} euro
                            </h4>
                        </div>
                        <div class="booking d-flex justify-content-center">
                            <a href="{{route('booking.create',[$item,$request['person']])}}"
                                class="btn btn-outline-success mt-2">Book a
                                ticket</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <span style="margin: 0 auto;">{{$result->links()}}</span>
</div>
@else
<div class="container d-flex justify-content-center mt-5 mb-5">
    <h1>There is no search results</h1>
</div>
@endif
@endsection.
@section('script')

@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        
        $('.company').click(function(){
            var companies=[];   
            $("input:checkbox[name=company]:checked").each(function(){
                companies.push($(this).val());

            });
          $('#companies').val(companies);
        });
        

        $('#destination').val($('#destination1').val());
            $('#date2').val($('#date').val())
        $('.change').each(function(){
           $('.change').on('change',function(){
            $('#destination').val($('#destination1').val());
            $('#date2').val($('#date').val())
           });
        });

        var min=parseInt($('#min_price').val());
        var max=parseInt($('#max_price').val());
        
        $('#amount').html(min+' - '+max+' eur');
        $('#slider').slider({
            range:true,
            min:min,
            max:max,
            values:[min,max],
                slide:function(event,ui){
                    console.log(ui.values[0],ui.values[1]);
                    $('#amount').html(ui.values[0]+' - '+ui.values[1]+' eur');
                    $('#min_price').val(ui.values[0]);
                    $('#max_price').val(ui.values[1]);
                }

        });

        $('#filterit').click(function(){
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              $.ajax({
                type:'get',
                url:'/filter2',
                data:{
                    ids:$('#ids').val(),
                    companies:$('#companies').val(),
                    min:$('#min_price').val(),
                    max:$('#max_price').val(),
                    page:'index',
                },
                success: function(result){
                 $('#result').html('');
                // console.log(result.html);
                 var html=result.html;
                 $('#result').html(html);
                }
              });
        });
  
    });
</script>
@endsection