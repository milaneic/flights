@extends('layouts.app')
@section('content')
<div class="container">
    <h1>All countries</h1>
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <td class="text-center">Number:</td>
                <td class="text-center">Name:</td>
                <td class="text-center">Country code:</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($countries as $country)
            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$country->name}}</td>
                <td class="text-center">{{$country->country_code}}</td>
                <td class="text-center"><a href="{{route('countries.edit',$country)}}">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection