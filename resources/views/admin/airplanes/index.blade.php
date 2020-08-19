@extends('layouts.app')
@section('content')
<div class="container">
    <h1>All ariplanes</h1>
    @foreach ($airplanes as $item)
    <p>{{$item->model}}</p>
    @endforeach
</div>
@endsection