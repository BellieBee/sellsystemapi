<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Product 1',
            'price' => 123.45,
            'tax' => 5
        ]);

        DB::table('products')->insert([
            'name' => 'Product 2',
            'price' => 45.65,
            'tax' => 15
        ]);

        DB::table('products')->insert([
            'name' => 'Product 3',
            'price' => 39.73,
            'tax' => 12
        ]);

        DB::table('products')->insert([
            'name' => 'Product 4',
            'price' => 250.00,
            'tax' => 8
        ]);

        DB::table('products')->insert([
            'name' => 'Product 5',
            'price' => 59.35,
            'tax' => 10
        ]);

    }
}
