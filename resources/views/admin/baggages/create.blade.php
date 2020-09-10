<x-admin-master>
    @section('content')
    <h1>Create a baggage</h1>
    <form action="{{route('baggages.store')}}" method="post">
        @csrf
        @method('POST')
        <x-display-errors></x-display-errors>
        <div class="form-group col-lg-6 col-md-8 col-sm-8">
            <label for="type">Type:</label>
            <input type="text" name="type" id="type" class="form-control" placeholder="Please insert a baggage type...">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                placeholder="Please insert a description...">
            </textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create a baggage</button>
        </div>
    </form>
    @endsection
</x-admin-master>