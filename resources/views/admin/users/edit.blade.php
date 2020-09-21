<x-admin-master>
    @section('content')

    <h1>Edit a user</h1>
    <form action="{{route('users.update',$user)}}" method="post">
        @csrf
        @method('PATCH')
        <x-display-errors></x-display-errors>
        <x-session-message></x-session-message>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control"
                placeholder="Please enter a password...">
        </div>
        <div class="form-group">
            <label for="password">Confirm a password:</label>
            <input type="password" name="password_confirmation" id="password_confirm" class="form-control"
                placeholder="Please confirm a password...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
    <form action="{{route('users.destroy',$user)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete a user</button></form>
    <table class="table table-striped mt-5">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Slug</th>
            <th class="text-center">Attach</th>
            <th class="text-center">Detach</th>
            <th class="text-center">User</th>
        </tr>
        @foreach (\App\Role::all() as $role)
        <tr>
            <td class="text-center">{{$role->id}}</td>
            <td class="text-center">{{$role->name}}</td>
            <td class="text-center">{{$role->slug}}</td>
            <td class="text-center">
                <form action="{{route('users.attach',['user'=>$user,'role'=>$role])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success" @if ($user->roles->contains($role))
                        disabled
                        @endif>Attach a role</button>
                </form>
            </td>
            <td class="text-center">

                <form action="{{route('users.detach',['user'=>$user,'role'=>$role])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" @if (!$user->roles->contains($role))
                        disabled
                        @endif
                        >Detach a role</button>
                </form>


            </td>
            <td class="text-center">
                <input type="checkbox" name="" disabled @if ($user->roles->contains($role))
                checked
                @endif
                id="">
            </td>
        </tr>
        @endforeach
    </table>

    </div>
    @endsection
</x-admin-master>