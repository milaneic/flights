@extends('layouts.app2')
@section('content')
{{-- <h1 class="p-4">Searched flights</h1>
<div class="container-fluid">
    <table class="table table-borderless mt-5 mb-5" id="myTable">
        <thead>
            <tr>
                <td class="text-center">#</td>
                <td class="text-center">Destination from</td>
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
            @if ($flights->count()>0)
            @foreach ($flights as $flight)
            <tr class="from={{Str::lower($flight->destination_from->name)}}
to={{Str::lower($flight->destination_to->name)}} flights">
<td class="text-center">{{++$i}}</td>
<td class="text-center">{{$flight->destination_from->name}}</td>
<td class="text-center">{{$flight->destination_to->name}}</td>
<td class="text-center">{{\Carbon\Carbon::parse($flight->departure_time)->format('H:i d/m/Y')}}</td>
<td class="text-center">{{\Carbon\Carbon::parse($flight->arrival_time)->format('H:i d/m/Y')}}</td>
<td class="text-center">{{$flight->min_price}}</td>
<td class="text-center"><a href="/booking/create/{{$flight->id}}/person/{{$person}}">Book a
        flight</a>
</td>
<td class="d-none">{{\Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d')}}</td>
<td class="d-none">{{\Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d')}}</td>
</tr>
@endforeach
@else
<tr>
    <td class="text-center" colspan="7">
        <h3>There is no flight for serched direction...</h3>
    </td>
</tr>
@endif
</tbody>
</table>
</div> --}}

{{-- <!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Destinations</h3>
                    <p>Pixel perfect design with awesome contents</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  --> --}}

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



<div class="popular_places_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="filter_result_wrap">
                    <h3>Filter Result</h3>
                    <div class="filter_bordered">
                        <div class="filter_inner">
                            <div class="row">
                                <form action="{{route('flight.filter')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="flights" value="{{json_encode($flights)}}">
                                    <input type="hidden" name="destination1" id="d1">
                                    <input type="hidden" name="destionation2" id="d2">
                                    <input type="hidden" name="date" id="d">
                                    <input type="hidden" name="person" id="p">
                                    <div class="col-lg-12">
                                        <div class="price-range">
                                            <h4>Price rande:</h4>
                                            <div id="slider"></div>
                                            <input type="hidden" name="min_price" id='min_price'
                                                value="{{$flights->min('min_price')}}">
                                            <input type="hidden" name="max_price" id="max_price"
                                                value="{{$flights->max('min_price')}}">
                                            <p class="text-center" id="amount"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4>Airline company:</h4>
                                        @foreach (App\AirlineCompany::all() as $company)
                                        <div class="mt-2">
                                            <input type="checkbox" name="company[]" value="{{$company->id}}"
                                                class="form-control company" id="">{{$company->name}}
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="reset_btn">
                                        <button class="boxed-btn4" id="filter" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- <div class="reset_btn">
                            <button class="boxed-btn4" type="submit">Reset</button>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
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
    </div>
</div>
@endsection.
@section('script')
<script>
    $(document).ready(function(){
        
        $('.company').click(function(){
            var companies=[];
           if($(this).is(':checked')){
               companies.push($(this).val());
           }else{
            companies.pop($(this).val());
           }
        });
        
        $('#d1').val($('#destination1').val());
        $('#d2').val($('#destination2').val());
        $('#d').val($('#date').val());
        $('#p').val($('#person').val());

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
        
});
</script>
@endsection