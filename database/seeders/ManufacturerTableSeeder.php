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
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin'),
            ],
            [
                'id' => $uuidManager->generate('apple'),
                'name' => 'Apple',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin'),
            ],
            [
                'id' => $uuidManager->generate('xiaomi'),
                'name' => 'Xiaomi',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin'),
            ],
        ]);
    }
}
