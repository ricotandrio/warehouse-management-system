<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $uuidManager = new UuidManager();

        $this->callWith(UserTableSeeder::class, ['uuidManager' => $uuidManager]);
        $this->callWith(ManufacturerTableSeeder::class, ['uuidManager' => $uuidManager]);
        $this->callWith(ProductCategoryTableSeeder::class, ['uuidManager' => $uuidManager]);
        $this->callWith(ProductTableSeeder::class, ['uuidManager' => $uuidManager]);
    }
}
