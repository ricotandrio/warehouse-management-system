<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $uuidManager = UuidManager::getInstance();

        DB::table('users')->insert([
            [
                'id' => $uuidManager->generate('admin'),
                'username' => 'admin',
                'password' => bcrypt('password'),
                'role' => 'ADMIN',
                'profile_image' => '/default/profile.png',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin'),
            ],
            [
                'id' => $uuidManager->generate('viewer'),
                'username' => 'viewer',
                'password' => bcrypt('password'),
                'role' => 'VIEWER',
                'profile_image' => '/default/profile.png',
                'created_at' => now(),
                'created_by' => $uuidManager->get('viewer'),
            ],
            [
                'id' => $uuidManager->generate('editor'),
                'username' => 'editor',
                'password' => bcrypt('password'),
                'role' => 'EDITOR',
                'profile_image' => '/default/profile.png',
                'created_at' => now(),
                'created_by' => $uuidManager->get('editor'),
            ]
        ]);
    }
}
