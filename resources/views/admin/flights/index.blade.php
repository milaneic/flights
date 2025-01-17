<x-admin-master>
    @section('content')
    <h1>All flights</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Destinatio from:</th>
                <th class="text-center">Departure time:</th>
                <th class="text-center">Destination to:</th>
                <th class="text-center">Arrival time:</th>
                <th class="text-center">Airplane:</th>
                <th class="text-center">Airline company:</th>
                <th class="text-center">Price:</th>
                <th class="text-center">Details:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flights as $flight)
            <tr>
                <td class="text-center">{{$flight->id}}</td>
                <td class="text-center">{{$flight->destination_from->name}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($flight->departure_time)->format('d-m-Y H:i')}}</td>
                <td class="text-center">{{$flight->destination_to->name}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($flight->arrival_time)->format('d-m-Y H:i')}}</td>
                <td class="text-center">{{$flight->airplane->model}}</td>
                <td class="text-center">{{$flight->airline_company->name}}</td>
                <td class="text-center">{{$flight->min_price}}</td>
                <td class="text-center"><a href="{{route('flights.edit',$flight)}}">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</x-admin-master>