@extends('layouts.app');
@section('content')
<div class="container">
    <h1>Edit a user</h1>
    <form action="{{route('users.update',$user)}}" method="post">
        @csrf
        @method('PATCH')
        <x-display-errors></x-display-errors>
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
            <input type="password" name="password_confirm" id="password_confirm" class="form-control"
                placeholder="Please confirm a password...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection