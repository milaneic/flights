@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create a airport</h1>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" disabled value="{{$airport->name}}">
    </div>

    <div class="form-group">
        <label for="destination_id">Destination:</label>
        <select name="destination_id" id="destination_id" class="form-control" disabled>
            @foreach ($destinations as $destination)
            <option value="{{$destination->id}}" @if ($destination->id == $airport->destination_id)
                selected
                @endif
                >{{$destination->name}}</option>
            @endforeach
        </select>
    </div>

</div>
@endsection