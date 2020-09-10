<x-admin-master>
    @section('content')
    <h1>Edit a policy</h1>

    <form action="{{URL('admin/policies/baggage/'.$baggage_id.'/company/'.$airline_company_id)}}" method="POST">
        @csrf
        @method('PATCH')
        <x-display-errors></x-display-errors>
        <x-session-message></x-session-message>
        <div class="col-lg-6 col-md-8 col-sm-8">
            <div class="form-group">
                <label for="baggage_id">Baggage:</label>
                <input type="text" name="baggage_id" id="baggage_id" class="form-control"
                    value="{{$policy->baggage->type}}" disabled>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-8">
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" id="price" class="form-control" value="{{$policy->price}}">
            </div>
        </div>
        <input name="baggage_id" value="{{$baggage_id}}" type="hidden">
        <input name="airline_company_id" value="{{$baggage_id}}" type="hidden">
        <button type="submit" class="btn btn-primary">Update a policy</button>
    </form>
    @endsection
</x-admin-master>