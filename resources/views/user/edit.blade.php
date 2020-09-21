@extends('layouts.app2')
@section('content')
<div class="container">
    <h1>Edit your account</h1>
    <form action="{{route('user.update',$user)}}" method="post">
        @csrf
        @method('PATCH')
        <x-display-errors></x-display-errors>
        <x-session-message></x-session-message>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control"
                placeholder="Please enter a password...">
        </div>
        <div class="form-group">
            <label for="password">Confirm a password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                placeholder="Please confirm a password...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection