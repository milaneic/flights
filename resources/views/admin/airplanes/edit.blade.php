<x-admin-master>
    @section('content')
    <h1>Airplane: {{$airplane->manufacture->name}} {{$airplane->model}}</h1>
    <form action="{{route('airplanes.update',$airplane)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{$airplane->model}}"
                style="width: 40%">
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="text" name="capacity" id="capacity" class="form-control" value="{{$airplane->capacity}}"
                style="width: 40%">
        </div>

        <div class="form-group">
            <label for="manufacture_id">Manufacture</label>
            <select name="manufacture_id" id="manufacture_id" class="form-control" style="width: 40%">

                @foreach ($manufactures as $o)
                <option value="{{$o->id}}" @if ($airplane->manufacture_id==$o->id)
                    selected
                    @endif>{{$o->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update airplane</button>
        </div>

    </form>
    <form action="{{route('airplanes.destroy',$airplane)}}" method="post">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <button class="btn btn-danger" type="submit">Delete airplane</button>
        </div>
    </form>
    @endsection
</x-admin-master>