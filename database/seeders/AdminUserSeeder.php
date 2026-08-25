<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Create Roles
        |--------------------------------------------------------------------------
        */

        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
        ]);


        Role::firstOrCreate([
            'name' => 'author',
        ]);


        Role::firstOrCreate([
            'name' => 'user',
        ]);



        /*
        |--------------------------------------------------------------------------
        | Create Admin User
        |--------------------------------------------------------------------------
        */

        $admin = User::firstOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
            ]
        );



        /*
        |--------------------------------------------------------------------------
        | Assign Role
        |--------------------------------------------------------------------------
        */

        $admin->assignRole($adminRole);
    }
}
