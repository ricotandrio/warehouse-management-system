<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manufacturer::create([
            'name' => 'Apple',
            'description' => 'Apple Inc. is an American multinational technology company that specializes in consumer electronics, computer software, and online services.',
        ]);

        Manufacturer::create([
            'name' => 'Samsung',
            'description' => 'Samsung Electronics Co., Ltd. is a South Korean multinational electronics company headquartered in the Yeongtong District of Suwon.',
        ]);

        Manufacturer::create([
            'name' => 'Xiaomi',
            'description' => 'Xiaomi Corporation is a Chinese multinational electronics company founded in April 2010 and headquartered in Beijing.',
        ]);

        Manufacturer::create([
            'name' => 'Kalbe Farma',
            'description' => 'PT Kalbe Farma',
        ]);
    }
}
