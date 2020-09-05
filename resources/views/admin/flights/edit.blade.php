<x-admin-master>
    @section('content')
    <h1>Edit a flight</h1>
    <form action="{{route('flights.update',$flight)}}" method="POST">
        @csrf
        @method('PATCH')
        <x-display-errors></x-display-errors>
        <x-session-message></x-session-message>
        <div class="form-group">
            <label for="departure_airport_id">Departure airport:</label>
            <select name="departure_airport_id" id="departure_airport_id" class="form-control" style="width: 40%">
                @foreach (App\Airport::all() as $airport)
                <option value="{{$airport->id}}" @if ($airport->id==$flight->departure_airport_id)
                    selected
                    @endif
                    >{{$airport->name}}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="departure_time">Daparture date:</label>
            <input type="datetime-local" name="departure_time" id="departure_time" class="form-control"
                style="width: 20%">
        </div>
        <div class="form-group">
            <label for="arrival_airport_id">Arrivaal airport:</label>
            <select name="arrival_airport_id" id="arrival_airport_id" class="form-control" style="width: 40%">
                @foreach (App\Airport::all() as $airport)
                <option value="{{$airport->id}}" @if ($airport->id==$flight->arrival_airport_id)
                    selected
                    @endif
                    >{{$airport->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="departure_time">Arrival date:</label>
            <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control" style="width: 20%">
        </div>

        <div class="form-group">
            <label for="airplane_id">Airplane:</label>
            <select name="airplane_id" id="airplane_id" class="form-control" style="width: 20%">
                @foreach (App\Airplane::all() as $airplane)
                <option value="{{$airplane->id}}">{{$airplane->manufacture->name}} {{$airplane->model}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="airline_company_id">Airline company:</label>
            <select name="airline_company_id" id="airline_company_id" class="form-control" style="width: 20%">
                @foreach (App\AirlineCompany::all() as $company)
                <option value="{{$company->id}}" @if ($company->id==$flight->airline_company_id)
                    selected
                    @endif
                    >{{$company->name}}</option>
                @endforeach</select>
        </div>
        <div class="form-group">
            <label for="gate">Gate:</label>
            <input type="number" name="gate" id="gate" class="form-control" style="width: 20%"
                value="{{$flight->gate}}">
        </div>

        <div class="form-group">
            <label for="min_price">Price:</label>
            <input type="text" name="min_price" id="min_price" class="form-control" style="width: 20%"
                value="{{$flight->min_price}}">
        </div>
        <button class="btn btn-primary">Update a flight</button>
    </form>
    @endsection
</x-admin-master>