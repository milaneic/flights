<x-admin-master>
    @section('content')
    <h1>Create a county</h1>
    <form action="{{route('countries.store')}}" method="post">
        @csrf
        @method('POST')
        <x-display-errors></x-display-errors>
        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Please enter country name...">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="country_code">Country code:</label>
            <input type="text" name="country_code" id="country_code" class="form-control"
                placeholder="Please enter country code maximung lenght of 2 chars...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create a county</button>
        </div>
    </form>
    @endsection
</x-admin-master>