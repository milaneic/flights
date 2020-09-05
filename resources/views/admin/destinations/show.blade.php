@extends('layouts.app')
@section('content')
<h1 class="text-center mt-3">{{$destination->name}}</h1>
@if (count($destination->images)>0)
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 justify-content-center h-90">
        <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel">
            <ol class="carousel-indicators">
                @for ($i = 0; $i < count($destination->images); $i++)
                    @if ($i==0)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>

                    @else
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                    @endif
                    @endfor
            </ol>
            <div class="carousel-inner" style="height: 80%">
                @php
                $i=0;
                @endphp
                @foreach ($destination->images as $item)
                @if ($i==0)
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('storage/'.$item->url)}}" alt="First slide">
                </div>
                @php
                $i++;
                @endphp
                @else
                <div class="carousel-item">
                    <img class="d-block w-100 " src="{{asset('storage/'.$item->url)}}" alt="First slide">
                </div>
                @endif
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @endif
        <div class="card mt-5">
            <h5 class="card-tittle p-4">Description</h5>
            <div class="card-text bg-light p-5">
                {{$destination->description}}
            </div>
        </div>
    </div>
</div>
<div class="col-md-1"></div>
@endsection