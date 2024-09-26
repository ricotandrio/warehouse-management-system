<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'name' => 'Smartphone',
            'description' => 'A smartphone is a mobile device that combines cellular and mobile computing functions into one unit.',
        ]);

        ProductCategory::create([
            'name' => 'Tablet',
            'description' => 'A tablet computer, commonly shortened to tablet, is a mobile device, typically with a mobile operating system and touchscreen display processing circuitry, and a rechargeable battery in a single, thin and flat package.',
        ]);

        ProductCategory::create([
            'name' => 'Laptop',
            'description' => 'A laptop, laptop computer, or notebook computer is a small, portable personal computer (PC) with a screen and alphanumeric keyboard.',
        ]);

        ProductCategory::create([
            'name' => 'Desktop',
            'description' => 'A desktop computer is a personal computer designed for regular use at a single location on or near a desk or table due to its size and power requirements.',
        ]);

        ProductCategory::create([
            'name' => 'Clothing',
            'description' => 'Clothing (also known as clothes, apparel, and attire) are items worn on the body.',
        ]);

        ProductCategory::create([
            'name' => 'Shoes',
            'description' => 'A shoe is an item of footwear intended to protect and comfort the human foot.',
        ]);

        ProductCategory::create([
            'name' => 'Accessories',
            'description' => 'An accessory is a person who assists in the commission of a crime, but who does not actually participate in the commission of the crime as a joint principal.',
        ]);
    }
}
