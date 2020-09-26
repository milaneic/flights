<?php

namespace App\Http\Controllers;

use App\Booking;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //


        return view('user.show', ['user' => $user, 'bookings' => Booking::where('user_id', $user->id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('admin.users.edit', ['user' => $user]);
    }

    public function editUser(User $user)
    {
        //
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if ($request['password'] != null || $request['confirm_password'] != null) {
            $inputs = $request->validate(
                [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                    'password' => ['required', 'string', 'min:8', 'confirmed']
                ]
            );
            $user->name = $inputs['name'];
            $user->email = $inputs['email'];
            $user->password = Hash::make($inputs['password']);
            if ($user->isDirty()) {
                $user->save();
            }
            session()->flash('message', 'Your data and password is successfuly changed!');
        } else {
            $inputs = $request->validate(
                [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                ]
            );
            $user->name = $inputs['name'];
            $user->email = $inputs['email'];
            if ($user->isDirty()) {
                $user->save();
            }
            session()->flash('message', 'Your data  is successfuly changed!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        session()->flash('message', $user->name . ' has been successfuly deleted!');
        session()->flash('alert-class', 'alert-success');
        return redirect()->route('users.index');
    }

    public function attach(User $user, Role $role)
    {
        $user->roles()->attach($role);
        session()->flash('message', $role->name . ' has been successfuly attached!');
        session()->flash('alert-class', 'alert-success');
        return redirect()->route('users.edit', $user);
    }

    public function detach(User $user, Role $role)
    {
        $user->roles()->detach($role);
        session()->flash('message', $role->name . ' has been successfuly detached!');
        session()->flash('alert-class', 'alert-danger');
        return back();
    }
}
