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
    <form action="{{route('companies.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Please enter company name...">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control"
                placeholder="Please enter company email...">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="phone" name="phone" id="phone" class="form-control"
                placeholder="Please enter company phone...">
        </div>
        <div class="form-group">
            <label for="country_id">Country:</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create a airline company</button>
        </div>
    </form>
</div>
@endsection