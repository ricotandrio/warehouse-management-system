<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturerTableSeeder extends Seeder
{
    public function run()
    {
        $uuidManager = UuidManager::getInstance();

        DB::table('manufacturers')->insert([
            [
                'id' => $uuidManager->generate('samsung'),
                'name' => 'Samsung',
                'profile_image' => '/default/profile.png',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin'),
            ],
            [
                'id' => $uuidManager->generate('apple'),
                'name' => 'Apple',
                'profile_image' => '/default/profile.png',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin'),
            ],
            [
                'id' => $uuidManager->generate('xiaomi'),
                'name' => 'Xiaomi',
                'profile_image' => '/default/profile.png',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin'),
            ],
        ]);
    }
}
