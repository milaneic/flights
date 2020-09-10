<x-admin-master>
    @section('content')
    <h1>Edit {{$baggage->type}}</h1>
    <form action="{{route('baggages.update',$baggage)}}" method="post">
        @csrf
        @method('PATCH')
        <x-display-errors></x-display-errors>
        <div class="form-group col-lg-6 col-md-8 col-sm-8">
            <label for="type">Type:</label>
            <input type="text" name="type" id="type" disabled class="form-control" value="{{$baggage->type}}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$baggage->description}}
            </textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update a baggage</button>
        </div>
    </form>
    <form action="{{route('baggages.destroy',$baggage)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete a baggage</button>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Airline company:</th>
                <th class="text-center">Price:</th>
                @if ($baggage->id!=1)
                <th class="text-center">Details:</th>
                @endif
            </tr>
            <tr>
                @php
                $i=1;
                @endphp
                @foreach (App\BaggagePolicy::where('baggage_id',$baggage->id)->get() as
                $policy)
            <tr>
                <td class="text-center">{{$i++}}</td>
                <td class="text-center">{{$policy->company->name}}</td>
                <td class="text-center">{{$policy->price}}</td>
                @if ($baggage->id!=1)
                <td class="text-center"><a
                        href="{{URL('admin/policies/baggage/'.$baggage->id.'/company/'.$policy->company->id)}}">Details</a>
                </td>
                @endif

            </tr>
            @endforeach
            </tr>
        </thead>
    </table>
    @endsection
</x-admin-master>