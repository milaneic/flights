<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            ['name' => 'Admin', 'slug' => 'admin'], ['name' => 'User', 'slug' => 'user'],
            ['name' => 'Moderator', 'slug' => 'moderator']
        ];

        foreach ($roles as $r) {
            Role::create($r);
        }
    }
}
