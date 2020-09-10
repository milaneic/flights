<x-admin-master>
    @section('content')
    <h1>Create a new airline company</h1>
    <x-display-errors></x-display-errors>
    <x-session-message></x-session-message>
    <form action="{{route('companies.update',$company)}}" method="post">
        @csrf
        @method('PATCH')

        <div class="form-group col-lg-6 col-md-8 col-sm-12">
            <label for="Name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$company->name}}">
        </div>
        <div class="form-group col-lg-6 col-md-8 col-sm-12">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$company->email}}">
        </div>
        <div class=" form-group col-lg-6 col-md-8 col-sm-12">
            <label for="phone">Phone:</label>
            <input type="phone" name="phone" id="phone" class="form-control" value="{{$company->phone}}">
        </div>
        <div class=" form-group col-lg-6 col-md-8 col-sm-12">
            <label for="country_id">Country:</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $country)
                <option value="{{$country->id}}" @if ($company->country_id==$country->id)
                    selected
                    @endif
                    >{{$country->name}}</option>
                @endforeach
            </select>
        </div>


        <h4>Define a baggage policy</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        Trolley bag
                    </th>
                    <th class="text-center">Small check-in</th>
                    <th class="text-center">Medium check-in</th>
                    <th class="text-center">Big check-in</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for ($i = 2; $i < 6; $i++) <td class="text-center">
                        <input type="text" name="bags[]" required
                            value="{{$company->baggage_policies()->where('baggage_id',$i)->first()->price}}" id=""></td>
                        @endfor
                </tr>
            </tbody>
        </table>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update a airline company</button>
        </div>
    </form>
    <form action="{{route('companies.destroy',$company)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete a airline company</button></form>
    @endsection
</x-admin-master>