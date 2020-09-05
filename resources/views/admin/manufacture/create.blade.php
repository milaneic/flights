<x-admin-master>
    @section('content')
    <h1>Create a manufacture of airplanes</h1>
    <form action="{{route('manufactures.store')}}" method="post">
        @csrf
        @method('POST')
        @if ($errors->any())
        <x-display-errors></x-display-errors>
        <x-session-message></x-session-message>
        @endif
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Plesa insert manufacture name.."
                style="width: 40%">
        </div>
        <div class="form-group">
            <label for="country_id">Name:</label>
            <select name="country_id" id="country_id" class="form-control" style="width: 40%">
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Create manufacture</button>
        </div>
    </form>
    @endsection
</x-admin-master>