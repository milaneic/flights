<x-admin-master>
    @section('content')
    <h1 class="mt-5">All ariplanes</h1>
    <x-display-errors></x-display-errors>
    <x-session-message></x-session-message>
    <table class="table table-striped mt-5">
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
                <td class="text-center"><a href="{{route('airplanes.edit',$a->id)}}">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</x-admin-master>