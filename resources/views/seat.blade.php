@extends('layouts.app')
<style>
    table {
        border: 1px solid black;
        margin: 0 auto;
    }

    table tr {
        margin-top: 10px;
    }

    button {
        padding: 5px;
    }
</style>
@section('content')
<div class="container">
    @php
    $a=['A','B','C','D','E','F']
    @endphp

    <table>
        @for ($i = 1; $i <= 30; $i++) <tr class="mt-3">
            @foreach ($a as $aa)
            <td class="mt-5"><button class="btn primary">{{$i}}{{$aa}}</button></td>
            @endforeach
            </tr> @endfor </table>
</div> @endsection