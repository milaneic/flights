<x-admin-master>
    @section('content')
    <h1>All destinations</h1>
    <x-session-message></x-session-message>
    <x-display-errors></x-display-errors>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name:</th>
                <th class="text-center">Country:</th>
                <th class="text-center">Description:</th>
                <th class="text-center">Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($destinations as $destination)
            <tr>
                <td class="text-center">{{$destination->id}}</td>
                <td class="text-center">{{$destination->name}}</td>
                <td class="text-center">{{$destination->country->name}}</td>
                <td class="text-center">{{\Illuminate\Support\Str::limit($destination->description,40,'...')}}</td>
                <td class="text-center"><a href="{{route('destinations.edit',$destination)}}">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$destinations->links()}}
    @endsection
</x-admin-master>n