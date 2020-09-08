@extends('layouts.app');
@section('content')
<div class="container">
    <h1>Edit a {{$country->name}}</h1>
    <form action="{{route('countries.update',$country)}}" method="post">
        @csrf
        @method('PATCH')
        <x-display-errors></x-display-errors>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$country->name}}">
        </div>
        <div class="form-group">
            <label for="country_code">Name:</label>
            <input type="text" name="country_code" id="country_code" class="form-control"
                value="{{$country->country_code}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update a county</button>
        </div>
    </form>
    <form action="{{route('countries.destroy',$country)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete a county</button>
    </form>
    <h2 class="mt-5">List of all destinations in {{$country->name}}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">#</td>
                <td class="text-center">Name:</td>
                <td class="text-center">Description:</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($destinations as $destination)
            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$destination->name}}</td>
                <td class="text-center">{{$destination->description}}</td>
                <td class="text-center"><a href="{{route('destinations.edit',$destination)}}">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection