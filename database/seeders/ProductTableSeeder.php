<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Samsung Galaxy S21+',
            'price' => 14999999,
            'sku' => 'SAMSUNG-GALAXY-S21-PLUS',
            'stock_quantity' => 10,
            'image' => 'https://cdn.dxomark.com/wp-content/uploads/medias/post-75482/SamsungGalaxys215gplus.jpg',
            'manufacturer_id' => '14575a29-e374-4b3f-8e9e-fef18ba50390',
            'category_id' => '80632c60-f132-4503-b69c-663e5ebd7481',
        ]);

        Product::create([
            'name' => 'Apple iPhone 12 Pro Max',
            'price' => 19999999,
            'sku' => 'APPLE-IPHONE-12-PRO-MAX',
            'stock_quantity' => 10,
            'image' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/7/29/6f371226-0db7-4278-8f9d-9871e9bcfc27.jpg',
            'manufacturer_id' => '14575a29-e374-4b3f-8e9e-fef18ba50390',
            'category_id' => '80632c60-f132-4503-b69c-663e5ebd7481',
        ]);

        Product::create([
            'name' => 'Xiaomi Redmi Note 10 Pro',
            'price' => 4999999,
            'sku' => 'XIAOMI-REDMI-NOTE-10-PRO',
            'stock_quantity' => 10,
            'image' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2021/5/4/f1bc70ed-7468-4d90-abd2-c4c064fbd22c.jpg',
            'manufacturer_id' => '14575a29-e374-4b3f-8e9e-fef18ba50390',
            'category_id' => '80632c60-f132-4503-b69c-663e5ebd7481',
        ]);
    }
}
