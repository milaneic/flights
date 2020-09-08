@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Manufacture: {{$manufacture->name}} of airplanes</h1>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$manufacture->id}}">
    </div>
    <div class="form-group">
        <label for="country_id">Name:</label>
        <input type="text" name="country_id" id="country_id" class="form-control"
            value="{{$manufacture->country->name}}">
    </div>
</div>
@endsection