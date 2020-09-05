@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit your account</h1>
    <form action="{{route('user.edit')}}" method="post"></form>
</div>

@endsection