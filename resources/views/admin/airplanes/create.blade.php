@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create airplane</h1>
    <form action="{{route('airplanes.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" placeholder="Insert model">
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Insert capacity">
        </div>

        <div class="form-group">
            <label for="manufacture_id">Manufacture</label>
            <select name="manufacture_id" id="manufacture_id" class="form-control">

                @foreach ($manufactures as $o)
                <option value="{{$o->id}}">{{$o->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update airplane</button>
        </div>

    </form>

</div>
@endsection