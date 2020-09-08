<x-admin-master>
    @section('content')
    <h1>Manufacture: {{$manufacture->name}} of airplanes</h1>
    <form action="{{route('manufactures.update',$manufacture)}}" method="post">
        @csrf
        @method('PATCH')
        @if ($errors->any())
        <x-display-errors></x-display-errors>
        <x-session-message></x-session-message>
        @endif
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$manufacture->name}}"
                style="width: 40%">
        </div>
        <div class="form-group">
            <label for="country_id">Name:</label>
            <select name="country_id" id="country_id" class="form-control" style="width: 40%">
                @foreach ($countries as $country)
                <option value="{{$country->id}}" @if ($manufacture->country_id==$country->id)
                    selected
                    @endif
                    >{{$country->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update manufacture</button>
        </div>
    </form>
    <form action="{{route('manufactures.destroy',$manufacture)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete manufacture</button>
    </form>
    <h3 class="mt-5">All planes from this manufacture:</h3>
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Model:</th>
                <th class="text-center">Capacity:</th>
                <th class="text-center">Details:</th>
            </tr>
        </thead>
        @php
        $i=0;
        @endphp
        <tbody>
            @if (count($manufacture->airplanes)>0)
            @foreach ($manufacture->airplanes as $airplane)
            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$airplane->model}}</td>
                <td class="text-center">{{$airplane->capacity}}</td>
                <td class="text-center"><a href="{{route('airplanes.edit',$airplane)}}">Details</a></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="4">
                    <h5>There is no airplane for this manufacture</h5>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    @endsection
</x-admin-master>