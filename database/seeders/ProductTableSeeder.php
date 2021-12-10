<?php

namespace Database\Seeders;

use App\Models\Product;
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
        // Laptops
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Laptop '.$i,
                'slug' => 'laptop-'.$i,
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/August2021/laptop-'.$i.'.jpg',
                'images' => '["products/August2021/laptop-2.jpg","products/August2021/laptop-3.jpg","products/August2021/laptop-4.jpg"]',

                'image' => 'products/dummy/laptop-'.$i.'.jpg',
                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->categories()->attach(1);
        }

        // Make Laptop 1 a Desktop as well. Just to test multiple categories
        $product = Product::find(1);
        $product->categories()->attach(2);

        // Phones
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'name' => 'Phone ' . $i,
                'slug' => 'phone-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [7, 8, 9][array_rand([7, 8, 9])] . ' inch screen, 4GHz Quad Core',
                'price' => rand(79999, 149999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/August2021/phone-'.$i.'.jpg',
                'images' => '["products/August2021/phone-2.jpg","products/August2021/phone-3.jpg","products/August2021/phone-4.jpg"]',
                'image' => 'products/dummy/phone-'.$i.'.jpg',
                'images' => '["products\/dummy\/phone-2.jpg","products\/dummy\/phone-3.jpg","products\/dummy\/phone-4.jpg"]',
            ])->categories()->attach(2);
        }

        // Tablets
        for ($i = 1; $i <= 15; $i++) {
            Product::create([
                'name' => 'Tablet ' . $i,
                'slug' => 'tablet-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [10, 11, 12][array_rand([10, 11, 12])] . ' inch screen, 4GHz Quad Core',
                'price' => rand(49999, 149999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/August2021/tablet-'.$i.'.jpg',
                'images' => '["products/August2021/tablet-2.jpg","products/August2021/tablet-3.jpg","products/August2021/tablet-4.jpg"]',
                'image' => 'products/dummy/tablet-'.$i.'.jpg',
                'images' => '["products\/dummy\/tablet-2.jpg","products\/dummy\/tablet-3.jpg","products\/dummy\/tablet-4.jpg"]',
            ])->categories()->attach(3);
        }

        // TVs
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'TV ' . $i,
                'slug' => 'tv-' . $i,
                'details' => [46, 50, 60][array_rand([7, 8, 9])] . ' inch screen, Smart TV, 4K',
                'price' => rand(79999, 149999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                'image' => 'products/August2021/tv-'.$i.'.jpg',
                'images' => '["products/August2021/tv-2.jpg","products/August2021/tv-3.jpg","products/August2021/tv-4.jpg"]',

                'image' => 'products/dummy/tv-'.$i.'.jpg',
                'images' => '["products\/dummy\/tv-2.jpg","products\/dummy\/tv-3.jpg","products\/dummy\/tv-4.jpg"]',

            ])->categories()->attach(4);
        }

        // Select random entries to be featured
        // Product::whereIn('id', [1, 12, 22, 31, 41, 43, 47, 51, 53,61, 69, 73, 80])->update(['featured' => true]);
    }
}
