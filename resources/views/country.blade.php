@extends('layouts.app')
@section('content')

<div class="container">
    <dl>
        @foreach ($country as $item)
        <li><a href="">{{$item->name}}</a></li>
        @if (count($item->destinations)>0)
        <ol>
            <p>Lista svih destiancija pomenute drzave</p>
            @foreach ($item->destinations as $item2)
            <li>{{$item2->name}}</li>
            @endforeach
        </ol>
        @endif
        @endforeach
    </dl>
</div>

@endsection