@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$baggage->type}}</h1>
    <div class="form-group">
        <label for="type">Type:</label>
        <input type="text" name="type" id="type" disabled class="form-control" value="{{$baggage->type}}">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" disabled cols="30" rows="10" class="form-control">{{$baggage->description}}
            </textarea>
    </div>
    <a href="{{URL::previous()}}" class="btn btn-success">Go back</a>

</div>
@endsection