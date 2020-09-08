<?php

namespace App\Policies;

use App\Passenger;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PassengerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Passenger  $passenger
     * @return mixed
     */
    public function view(User $user, Passenger $passenger)
    {
        //
        // dd($passenger->ticket->booking->user_id);
        return $user->hasRole('admin')  ?: $user->id == $passenger->ticket->booking->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Passenger  $passenger
     * @return mixed
     */
    public function update(User $user, Passenger $passenger)
    {
        //
        return $user->hasRole('admin')  ?: $user->id == $passenger->ticket->booking->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Passenger  $passenger
     * @return mixed
     */
    public function delete(User $user, Passenger $passenger)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Passenger  $passenger
     * @return mixed
     */
    public function restore(User $user, Passenger $passenger)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Passenger  $passenger
     * @return mixed
     */
    public function forceDelete(User $user, Passenger $passenger)
    {
        //
    }
}
