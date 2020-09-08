@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit {{$baggage->type}}</h1>
    <form action="{{route('baggages.update',$baggage)}}" method="post">
        @csrf
        @method('PATCH')
        <x-display-errors></x-display-errors>
        <div class="form-group">
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
        <button type="submit" class="btn btn-danger">Delete a baggage</button></form>
</div>
@endsection