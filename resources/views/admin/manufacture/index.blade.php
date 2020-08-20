@extends('layouts.app')
@section('content')
<div class="container">
    <h1>All manufactures</h1>
    <h4 class="mt-5"><a href="{{route('manufactures.create')}}">Create a manufactur</a></h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">Name:</td>
                <td class="text-center">Country:</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($manufactures as $manufactur)
            <tr>
                <td class="text-center">{{$manufactur->name}}</td>
                <td class="text-center">{{$manufactur->country->name}}</td>
                <td class="text-center"><a href="{{route('manufactures.edit',$manufactur)}}">Detalji</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection