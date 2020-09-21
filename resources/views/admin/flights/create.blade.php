<x-admin-master>
    @section('content')
    <h1>Create a flight</h1>
    <x-display-errors></x-display-errors>
    <x-session-message></x-session-message>
    <form action="{{route('flights.store')}}" method="post">
        @csrf
        <input type="datetime-local" name="now" hidden
            value="{{\Carbon\Carbon::now()->addHours(2)->format('Y-m-d\TH:i')}}" id="">
        <div class="form-group">
            <label for="departure_airport_id">Departure airport id:</label>
            <select name="departure_airport_id" id="departure_airport_id" class="form-control" style="width: 40%">
                @foreach (App\Airport::all() as $airport)
                <option value="{{$airport->id}}">{{$airport->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="departure_time">Departure time:</label>
            <input type="datetime-local" name="departure_time" id="departure_time" class="form-control"
                style="width: 40%">
        </div>
        <div class="form-group">
            <label for="arrival_airport_id">Arrival airport id:</label>
            <select name="arrival_airport_id" id="arrival_airport_id" class="form-control" style="width: 40%">
                @foreach (App\Airport::all() as $airport)
                <option value="{{$airport->id}}">{{$airport->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="arrival_time">Arrival time:</label>
            <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control" style="width: 40%">
        </div>

        <div class="form-group">
            <label for="gate">Gate:</label>
            <input type="number" name="gate" id="gate" class="form-control" style="width: 40%">
        </div>
        <div class="form-group">
            <label for="airplane_id">Airplane:</label>
            <select name="airplane_id" id="airplane_id" class="form-control" style="width: 40%">
                @foreach (App\Airplane::all() as $airplane)
                <option value="{{$airplane->id}}">{{$airplane->manufacture->name}} {{$airplane->model}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="airline_company_id">Airline company:</label>
            <select name="airline_company_id" id="airline_company_id" class="form-control" style="width: 40%">
                @foreach (App\AirlineCompany::all() as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-gorup">
            <Label for="min_price">Minumum price:</Label>
            <input type="text" name="min_price" id="min_price" class="form-control" style="width: 40%">
        </div>
        <button type="submit" class="btn btn-primary">Create a flight</button>
    </form>

    @endsection
</x-admin-master>