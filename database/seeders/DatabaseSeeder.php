<?php

namespace Database\Seeders;

use Database\Seeders\ProductTableSeeder;
use Database\Seeders\CategoryTableSeeder;
use Database\Seeders\OrdersTableSeeder;
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
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
