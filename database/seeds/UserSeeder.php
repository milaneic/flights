<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class, 100)->create()->each(function ($user) {
            $role = Role::find(3);
            $user->roles()->save($role);
        });
    }
}
