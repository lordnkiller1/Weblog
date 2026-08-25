<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [

            // Users
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',


            // Categories
            'categories.view',
            'categories.create',
            'categories.edit',
            'categories.delete',


            // Posts
            'posts.view',
            'posts.create',
            'posts.edit',
            'posts.delete',


            // Tags
            'tags.view',
            'tags.create',
            'tags.edit',
            'tags.delete',

        ];


        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
