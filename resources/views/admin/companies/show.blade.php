@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create a new airline company</h1>
    @if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="Name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$company->name}}">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{$company->email}}">
    </div>
    <div class=" form-group">
        <label for="phone">Phone:</label>
        <input type="phone" name="phone" id="phone" class="form-control" value="{{$company->phone}}">
    </div>
    <div class=" form-group">
        <label for="country_id">Country:</label>
        <input type="text" name="country_id" id="country_id" class="form-control" value="{{$company->country->name}}">
    </div>

    @endsection