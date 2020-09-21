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