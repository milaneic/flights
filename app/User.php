<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function hasRole($role_slug)
    {
        foreach ($this->roles as $role) {
            if (Str::lower($role->slug) == Str::lower($role_slug)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function assignRole(Role $role)
    {
        return $this->roles()->attach($role);
    }

    public function detachRole(Role $role)
    {
        return $this->roles()->detach($role);
    }
}
