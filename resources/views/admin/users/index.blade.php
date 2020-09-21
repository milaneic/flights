<x-admin-master>
    @section('content')


    <h1>All users</h1>
    <x-display-errors></x-display-errors>
    <x-session-message></x-session-message>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">#</td>
                <td class="text-center">Name:</td>
                <td class="text-center">Email:</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        @php
        $i=0;
        @endphp
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center"><a href="{{route('users.edit',$user)}}" class="btn btn-primary">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</x-admin-master>