<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Mobiles, Gadgets & Accessories'],
            ['name' => 'Laptops & Computers'],
            ['name' => 'Toys & Collectibles'],
            ['name' => 'Gaming'],
            ['name' => 'Babies & Kids'],
            ['name' => 'Home & Living'],
            ['name' => 'Groceries'],
            ['name' => 'Mens Apparel & Accessories'],
            ['name' => 'Womens Apparel & Accessories'],
            ['name' => 'Men\'s Shoes & Bags'],
            ['name' => 'Women\'s Shoes & Bags'],
            ['name' => 'Hobbies & Stationery'],
            ['name' => 'Health & Personal Care'],
            ['name' => 'Makeup & Fragrancies'],
            ['name' => 'Home Entertainment'],
            ['name' => 'Home Appliances'],
            ['name' => 'Cameras'],
            ['name' => 'Sports & Travel'],
            ['name' => 'Motors'],
            ['name' => 'Digital Goods'],
            ['name' => 'Pet Care'],
        ]);
    }
}
