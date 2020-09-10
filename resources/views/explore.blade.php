@extends('layouts.app2')
@section('content')
<div class="container mb-5">
    {{-- @php
    dd($destination1 ?? '',$date ?? '')
    @endphp --}}
    <h1 class="text-center">Explore the world</h1>
    <hr class="mt-5">
    <form action="{{route('explore.search')}}" method="get">
        <div class="card">
            <div class="card-body d-flex justify-content-around align-items-center">
                <div class="form-group">
                    <label for="destination1">Search flights from destination:</label>
                    <select name="destination1" id="destination1" class="form-control w-60 change">
                        @foreach (App\Destination::orderBy('name','ASC')->get() as $item)
                        <option value="{{$item->id}}" @if ($destination1 ?? '' ) @if ($destination1==$item->id)
                            selected
                            @endif

                            @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <i class="fas fa-plane fa-3x"></i>
                </div>
                <div class="form-group">
                    <label for="f">Date:</label>
                    <input type="date" name="date" id="date" class="form-control change" @if ($date ?? '' !=null)
                        value="{{$date ?? ''}}" @endif>
                </div>

                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>
@if ($result ?? ''!=null && count($result)>0)
<hr class="mt-5">
<div class="row">

    <div class="col-md-2 m-3">
        <form action="{{route('explore.filter')}}" method="POST">
            @csrf
            @php
            $ids=[];
            foreach ($result as $flights) {
            array_push($ids,$flights->id);
            }
            @endphp
            <input type="text" name="destination1" id="destination">
            <input type="textw" name="date" id="date2">
            <input type="hidden" name="result" value="{{json_encode($ids)}}">
            <h3>Filter:</h3>
            <hr>
            <div class="price-range">
                <h5>Price rande:</h5>
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
                <div class="airlines p-2">
                    @foreach (App\AirlineCompany::all() as $item)
                    <input type="checkbox" name="company[]" id="{{$item->name}}" value="{{$item->id}}">
                    {{$item->name}}
                    <br>
                    @endforeach
                </div>
            </div>
            <div class="airports">
                <h5>Airports</h5>
                <hr>
            </div>
            <div class="text-center"><button type="submit" id="filter" class="boxed-btn4">Filter</button></div>
        </form>
    </div>
    <div class="col-md-8">


        <h2 class="text-center">Searched flights</h2>

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
                                $flight_duration=$time_departure->diff($time_arrival)->format('%hh%im ');
                                //dd($flight_duration); @endphp <div class="time">
                                    @endphp
                                    <h4>{{$flight_duration}}</h4>
                                </div>
                                <p>{{$item->airport_from->ident}} - {{$item->airport_to->ident}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="box2" style="width:20%">
                        <div class="price border-bottom" style="height: 60%">
                            <h4 class="text-center" style="margin: auto">{{$item->min_price}} euro</h4>
                        </div>
                        <div class="booking d-flex justify-content-center">
                            <a href="{{route('booking.create',[$item,1])}}" class="btn btn-outline-success mt-2">Book a
                                ticket</a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        <span style="margin: 0 auto;">{{$result->links()}}</span>
        @endif

    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        // $('#filter').click(function(){
        //     var companies=[];
        //     var destination1=$('#destination1').val();
        //     var date=$('#date').val();
        //   $('.airline').each(function(){
        //       if($(this).is(':checked')){
        //           companies.push($(this).val());
        //       }
              
        //   });
          
        //   var Companies=companies.toString();
        //   //ajax
        //   $.ajax({
        //       type:'get',
        //       dataType:'    ',
        //       url:'{{URL("explore.filter")}}',
        //       data:{
        //           destination1:destination1,date:date,Companies:Companies
        //       },
        //       success:function(result){
        //         console.log(result);
        //       }
        //   })
        // });
        $('#destination').val($('#destination1').val());
            $('#date2').val($('#date').val())
        $('.change').each(function(){
           $('.change').on('change',function(){
            $('#destination').val($('#destination1').val());
            $('#date2').val($('#date').val())
           });
        })
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