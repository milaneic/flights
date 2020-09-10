<x-admin-master>
    @section('content')
    <form action="{{route('companies.store')}}" method="post">
        @csrf
        @method('POST')
        <x-display-errors></x-display-errors>
        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="Name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Please enter company name...">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control"
                placeholder="Please enter company email...">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="phone">Phone:</label>
            <input type="phone" name="phone" id="phone" class="form-control"
                placeholder="Please enter company phone...">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="country_id">Country:</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
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
                        <input type="text" name="bags[]" required value="20" id=""></td>
                        @endfor
                </tr>
            </tbody>
        </table>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create a airline company</button>
        </div>
    </form>
    @endsection
</x-admin-master>