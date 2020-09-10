<x-admin-master>
    <x-display-errors></x-display-errors>
    <x-session-message></x-session-message>
    @section('content')
    <h1>Edit a airport</h1>
    <form action="{{route('airports.update',$airport)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="col-lg-6 col-md-8 col-sm-8">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Please insert name..."
                    value="{{$airport->name}}">
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-8">
            <div class="form-group">
                <label for="destination_id">Destination:</label>
                <select name="destination_id" id="destination_id" class="form-control">
                    @foreach ($destinations as $destination)
                    <option value="{{$destination->id}}" @if ($destination->id==$airport->id)
                        selected
                        @endif
                        >{{$destination->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-8">
            <label for="ident">Indetifination code:</label>
            <input type="text" name="ident" id="ident" class="form-control"
                placeholder="Please insert identificatio code..." value="{{$airport->ident}}">
        </div>

        <div class="form-group mt-5">
            <button type="submit" class="btn btn-primary">Edit a airport</button>
        </div>
    </form>
    <form action="{{route('airports.destroy',$airport)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete a airport</button></form>
    @endsection
</x-admin-master>