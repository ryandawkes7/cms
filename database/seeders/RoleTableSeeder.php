<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed regular role criteria
        $role_regular_user = new Role;
        $role_regular_user->name = 'user';
        $role_regular_user->description = 'A regular user';
        $role_regular_user->save();

        // Seed admin role criteria
        $role_admin_user = new Role;
        $role_admin_user->name = 'admin';
        $role_admin_user->description = 'An admin user';
        $role_admin_user->save();
    }
}
