<x-admin-master>
    @section('content')
    <h1>Create a flight</h1>
    <form action="{{route('flights.create')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="departure_airport_id">Departure airport id:</label>
            <select name="departure_airport_id" id="departure_airport_id" class="form-control">
                @foreach (App\Airport::all() as $airport)
                <option value="{{$airport->id}}">{{$airport->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="departure_time">Departure time:</label>
            <input type="datetime-local" name="departure_time" id="departure_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="arrival_airport_id">Arrival airport id:</label>
            <select name="arrival_airport_id" id="arrival_airport_id" class="form-control">
                @foreach (App\Airport::all() as $airport)
                <option value="{{$airport->id}}">{{$airport->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="arrival_time">Arrival time:</label>
            <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control">
        </div>

        <div class="form-group">
            <label for="gate">Gate:</label>
            <input type="number" name="gate" id="gate" class="form-control">
        </div>
        <div class="form-group">
            <label for="airplane_id">Airplane:</label>
            <select name="airplane_id" id="airplane_id" class="form-control">
                @foreach (App\Airplane::all() as $airplane)
                <option value="{{$airplane->id}}">{{$airplane->manufacture->name}} {{$airplane->model}}</option>
                @endforeach
            </select>
        </div>

    </form>

    @endsection
</x-admin-master>