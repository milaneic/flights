@extends('layouts.app2');
@section('content')
<div class="container mt-5 mb-5">
    <h1>{{$country->name}}</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" disabled value="{{$country->name}}">
            </div>
            <div class="form-group">
                <label for="country_code">Country code:</label>
                <input type="text" name="country_code" id="country_code" disabled class="form-control"
                    value="{{$country->country_code}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="single-defination">
                <h4 class="mb-20">Description</h4>
                <p>{{$country->description}}</p>
            </div>
        </div>
    </div>

    <h2 class="mt-5 mb-3">List of all destinations in {{$country->name}}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">#</td>
                <td class="text-center">Name:</td>
                <td class="text-center">Description:</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($destinations as $destination)
            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$destination->name}}</td>
                <td class="text-center">{{Str::limit($destination->description,80,'..')}}</td>
                <td class="text-center"><a href="{{route('destination.show',$destination)}}">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection