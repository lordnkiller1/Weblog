<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678',
                'role' => 'admin',
            ],
            [
                'name' => 'Author',
                'email' => 'author@gmail.com',
                'password' => '12345678',
                'role' => 'author',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => '12345678',
                'role' => 'user',
            ],
        ];


        foreach ($users as $data) {

            $user = User::firstOrCreate(
                [
                    'email' => $data['email'],
                ],
                [
                    'name' => $data['name'],
                    'password' => Hash::make($data['password']),
                ]
            );


            $user->syncRoles([
                $data['role'],
            ]);
        }
    }
}
