<x-admin-master>
    @section('content')
    <h1>All airlines companies</h1>
    <x-session-message></x-session-message>
    <h4 class="mt-5"><a href="{{route('companies.create')}}">Create a airline company</a></h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center">Name:</td>
                <td class="text-center">Country:</td>
                <td class="text-center">Email:</td>
                <td class="text-center">Phone:</td>
                <td class="text-center">Details:</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td class="text-center">{{$company->name}}</td>
                <td class="text-center">{{$company->country->name}}</td>
                <td class="text-center">{{$company->email}}</td>
                <td class="text-center">{{$company->phone}}</td>
                <td class="text-center"><a href="{{route('companies.edit',$company)}}">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</x-admin-master>