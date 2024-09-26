<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'ADMIN',
            'profile_image' => 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',
        ]);
        
        User::create([
            'username' => 'viewer',
            'password' => bcrypt('password'),
            'role' => 'VIEWER',
            'profile_image' => 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',
        ]);
        
        User::create([
            'username' => 'editor',
            'password' => bcrypt('password'),
            'role' => 'EDITOR',
            'profile_image' => 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',
        ]);
    }
}
