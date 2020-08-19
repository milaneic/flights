@extends('layouts.app')
@section('content')
<div class="container">
    <h1>All ariplanes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">Model:</td>
                <td class="text-center">Manufacture:</td>
                <td class="text-center">Capacity:</td>
                <td class="text-center">Details</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($airplanes as $a)
            <tr>
                <td class="text-center">
                    {{$a->model}}
                </td>
                <td class="text-center">
                    {{$a->Manufacture->name}}
                </td>
                <td class="text-center">
                    {{$a->capacity}}
                </td>
                <td class="text-center"><a href="{{route('airplanes.edit',$a->id)}}">Detaljnije</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection