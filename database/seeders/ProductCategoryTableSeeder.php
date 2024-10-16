<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryTableSeeder extends Seeder
{
    public function run()
    {        
        $uuidManager = UuidManager::getInstance();

        DB::table('product_categories')->insert([
            [
                'id' => $uuidManager->generate('smartphone'),
                'name' => 'Smartphone',
                'description' => 'A smartphone is a mobile device that combines cellular and mobile computing functions into one unit.',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin')
            ],
            [
                'id' => $uuidManager->generate('tablet'),
                'name' => 'Tablet',
                'description' => 'A tablet computer, commonly shortened to tablet, is a mobile device, typically with a mobile operating system and touchscreen display processing circuitry, and a rechargeable battery in a single, thin and flat package.',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin')
            ],
            [
                'id' => $uuidManager->generate('laptop'),
                'name' => 'Laptop',
                'description' => 'A laptop, laptop computer, or notebook computer is a small, portable personal computer (PC) with a screen and alphanumeric keyboard.',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin')
            ],
            [
                'id' => $uuidManager->generate('desktop'),
                'name' => 'Desktop',
                'description' => 'A desktop computer is a personal computer designed for regular use at a single location on or near a desk or table due to its size and power requirements.',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin')
            ],
            [
                'id' => $uuidManager->generate('clothing'),
                'name' => 'Clothing',
                'description' => 'Clothing (also known as clothes, apparel, and attire) are items worn on the body.',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin')
            ],
            [
                'id' => $uuidManager->generate('shoes'),
                'name' => 'Shoes',
                'description' => 'A shoe is an item of footwear intended to protect and comfort the human foot.',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin')
            ],
            [
                'id' => $uuidManager->generate('accessories'),
                'name' => 'Accessories',
                'description' => 'An accessory is a person who assists in the commission of a crime, but who does not actually participate in the commission of the crime as a joint principal.',
                'created_at' => now(),
                'created_by' => $uuidManager->get('admin')
            ]
        ]);
    }
}
