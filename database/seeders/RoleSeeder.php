<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);


        $author = Role::firstOrCreate([
            'name' => 'author',
            'guard_name' => 'web',
        ]);


        $user = Role::firstOrCreate([
            'name' => 'user',
            'guard_name' => 'web',
        ]);



        /*
        |--------------------------------------------------------------------------
        | Admin Permissions
        |--------------------------------------------------------------------------
        */

        $admin->syncPermissions(
            Permission::all()
        );



        /*
        |--------------------------------------------------------------------------
        | Author Permissions
        |--------------------------------------------------------------------------
        */

        $author->syncPermissions([
            'dashboard.view',
            'posts.view',
            'posts.create',
            'posts.edit',

            'categories.view',

            'tags.view',

        ]);



        /*
        |--------------------------------------------------------------------------
        | User Permissions
        |--------------------------------------------------------------------------
        */

        $user->syncPermissions([

            'posts.view',

        ]);

    }
}