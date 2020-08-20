@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Manufacture: {{$manufacture->name}} of airplanes</h1>
    <form action="{{route('manufactures.update',$manufacture)}}" method="post">
        @csrf
        @method('PATCH')
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
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$manufacture->name}}">
        </div>
        <div class="form-group">
            <label for="country_id">Name:</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $country)
                <option value="{{$country->id}}" @if ($manufacture->country_id==$country->id)
                    selected
                    @endif
                    >{{$country->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update manufacture</button>
        </div>
    </form>
    <form action="{{route('manufactures.destroy',$manufacture)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete manufacture</button></form>
</div>
@endsection