@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$passenger->id}} </h1>
    @if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('passenger.update',$passenger)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="first_name">First name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control"
                value="{{$passenger->first_name}}">
        </div>

        <div class="form-group">
            <label for="last_name">Last name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{$passenger->last_name}}">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" class="form-control">
                @php
                $options=['male','female'];
                $options2=['passport','card'];
                @endphp
                @foreach ($options as $option)
                <option value="{{$option}}" @if ($passenger->gender==$option)
                    selected
                    @endif
                    >{{ucFirst(trans($option))}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="document_type">Document type:</label>
            <select name="document_type" id="document_type" class="form-control">
                @foreach ($options2 as $option)
                <option value="{{$option}}" @if ($option==$passenger->document_type)
                    selected
                    @endif>{{ucFirst(trans($option))}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="document_number">Document number:</label>
            <input type="text" name="document_number" id="document_number" class="form-control"
                value="{{$passenger->document_number}}">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update a passenger</button>
        </div>
    </form>
    {{-- <form action="{{route('airports.destroy',$airport)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete a airport</button></form> --}}
</div>
@endsection