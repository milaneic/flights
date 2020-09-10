<x-admin-master>
    @section('content')
    <h1>All baggages</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">#</td>
                <td class="text-center">Type</td>
                <td class="text-center">Description</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        @php
        $i=0;
        @endphp
        <tbody>
            @foreach ($baggages as $baggage)
            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$baggage->type}}</td>
                <td class="text-center">{{Str::limit($baggage->description,50,'...')}}</td>
                <td class="text-center"><a href="{{route('baggages.edit',$baggage)}}">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</x-admin-master>