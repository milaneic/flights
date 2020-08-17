@extends('layouts.app')
@section('content')

<div class="container">
    <dl>
        @foreach ($manufacture as $item)
        <li><a href="">{{$item->name}}</a></li>
        @if (count($item->airplanes)>0)
        <ol>
            <p>Lista svih nasih aviona</p>
            @foreach ($item->airplanes as $item2)
            <li>{{$item2->model}} kapacitet letelice <strong>{{$item2->capacity}}</strong></li>
            @endforeach
        </ol>
        @endif
        @endforeach
    </dl>
</div>

@endsection