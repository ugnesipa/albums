<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //runs the seeds for user table
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Ugne Sipa';
        $admin->email = 'ugnesipa@gmail.com';
        $admin->password = Hash::make('password');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Patric Star';
        $user->email = 'starfish@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
