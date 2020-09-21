<x-admin-master>
    @section('content')
    <h1 class="text-center mt-3">
        Create a new Destination
    </h1>
    <x-display-errors></x-display-errors>
    <form action="{{route('destinations.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control"
                placeholder="Please insert destination name..." style="width: 40%">
        </div>
        <div class="form-group">
            <label for="country_id">Country:</label>
            <select name="country_id" id="country_id" class="form-control" style="width: 40%">
                @foreach (App\Country::all() as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Description:</label>
            <textarea name="description" id="description" cols="100" class="form-control" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label><br>
            <input type="file" name="file[]" multiple id="image" class="form-file">
        </div>

        <button class="btn btn-primary" type="submit">Create a destination</button>
    </form>
    @endsection
</x-admin-master>