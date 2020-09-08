<x-admin-master>
    @section('content')
    <x-display-errors></x-display-errors>
    <x-session-message></x-session-message>
    <form action="{{route('destinations.update',$destination)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h1>Edit a {{$destination->name}}</h1>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control"
                placeholder="Please insert destination name..." value="{{$destination->name}}">
        </div>
        <div class="form-group">
            <label for="country_id">Country:</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach (App\Country::all() as $item)
                <option value="{{$item->id}}" @if($item->id==$destination->country_id)
                    selected
                    @endif
                    >{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Description:</label>
            <textarea name="description" id="description" cols="100" class="form-control" rows="10">
                {{$destination->description}}
            </textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label><br>
            <input type="file" name="file[]" multiple id="image" class="form-file">
        </div>
        <button class="btn btn-primary" type="submit">Update a destination</button>
    </form>
    @endsection
</x-admin-master>