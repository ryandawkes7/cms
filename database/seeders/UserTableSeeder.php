<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed regular user criteria
        $user = new User;
        $user->name = 'Regular User';
        $user->email = 'testing@gmail.com';
        $user->password = bcrypt('samuel1234');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        // Seed admin user criteria
        $admin = new User;
        $admin->name = 'Admin User';
        $admin->email = 'admin@mail.co';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
