@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center mt-3">
        Create a new Destination
    </h1>
    <x-display-errors></x-display-errors>
    <form action="{{route('destinations.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control"
                placeholder="Please insert destination name...">
        </div>
        <div class="form-group">
            <label for="country_id">Country:</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach (App\Country::all() as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <textarea name="description" id="description" cols="100" class="form-control" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label><br>
            <input type="file" name="image" id="image" class="form-file">
        </div>

        <button class="btn btn-primary" type="submit">Create a destination</button>
    </form>
</div>
@endsection