@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Airplane: {{$airplane->model}}</h1>
    <form action="{{route('airplanes.update',$airplane)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{$airplane->model}}">
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="text" name="capacity" id="capacity" class="form-control" value="{{$airplane->capacity}}">
        </div>

        <div class="form-group">
            <label for="manufacture_id">Manufacture</label>
            <select name="manufacture_id" id="manufacture_id" class="form-control">

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

</div>
@endsection