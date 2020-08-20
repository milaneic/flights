@extends('layouts.app');
@section('content')
<div class="container">
    <h1>Create a county</h1>
    <form action="{{route('countries.store')}}" method="post">
        @csrf
        @method('POST')
        <x-display-errors></x-display-errors>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Please enter country name...">
        </div>
        <div class="form-group">
            <label for="country_code">Country code:</label>
            <input type="text" name="country_code" id="country_code" class="form-control"
                placeholder="Please enter country code maximung lenght of 2 chars...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update a county</button>
        </div>
    </form>
</div>
@endsection