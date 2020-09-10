<x-admin-master>
    @section('content')
    <h1>Create a airport</h1>
    @if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('airports.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="col-lg-6 col-md-8 col-sm-8">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Please insert name...">
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-8">
            <div class="form-group">
                <label for="destination_id">Destination:</label>
                <select name="destination_id" id="destination_id" class="form-control">
                    @foreach ($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-8">
            <label for="ident">Indetifination code:</label>
            <input type="text" name="ident" id="ident" class="form-control"
                placeholder="Please insert identificatio code...">
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary">Create a airport</button>
        </div>
    </form>
    @endsection
</x-admin-master>