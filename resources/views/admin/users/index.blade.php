@extends('layouts.app')
@section('content')
<div class="container">
    <h1>All users</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">#</td>
                <td class="text-center">Name:</td>
                <td class="text-center">Email:</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        @php
        $i=0;
        @endphp
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection