@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create a manufacture of airplanes</h1>
    <form action="{{route('manufactures.store')}}" method="post">
        @csrf
        @method('POST')
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
            <input type="text" name="name" id="name" class="form-control" placeholder="Plesa insert manufacture name..">
        </div>
        <div class="form-group">
            <label for="country_id">Name:</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Create manufacture</button>
        </div>
    </form>

</div>
@endsection