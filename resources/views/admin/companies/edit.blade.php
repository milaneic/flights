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
    <form action="{{route('companies.update',$company)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="alert alert-danger mt-5">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
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
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $country)
                <option value="{{$country->id}}" @if ($company->country_id==$country->id)
                    selected
                    @endif
                    >{{$country->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create a airline company</button>
        </div>
    </form>

    <form action="{{route('companies.destroy',$company)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete a airline company</button></form>
</div>
@endsection