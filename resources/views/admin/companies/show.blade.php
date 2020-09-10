@extends('layouts.app2')
@section('content')

<div class="container mb-5">
    <h1>{{$company->name}}</h1>
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
        <input type="text" name="country_id" id="country_id" class="form-control" value="{{$company->country->name}}">
    </div>
    <h3>Bagage price policies</h3>
    <ul class="unordered-list mb-5">
        @foreach ($company->baggage_policies()->get() as $policy)
        @if ($policy->baggage_id==1)
        <li>{{$policy->baggage->type}} price: <strong>free</strong></li>
        @else
        <li>{{$policy->baggage->type}} price: <strong>{{$policy->price}}</strong></li>
        @endif
        @endforeach
    </ul>
    <a href="{{URL::previous()}}" class="genric-btn primary-border">Go back</a>
</div>
@endsection