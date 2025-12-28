<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 15',
                'price' => 1200.00,
                'stock_quantity' => 10,
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'price' => 1100.00,
                'stock_quantity' => 8,
            ],
            [
                'name' => 'MacBook Air M2',
                'price' => 1500.00,
                'stock_quantity' => 5,
            ],
            [
                'name' => 'Dell XPS 13',
                'price' => 1400.00,
                'stock_quantity' => 6,
            ],
            [
                'name' => 'iPad Pro',
                'price' => 900.00,
                'stock_quantity' => 12,
            ],
            [
                'name' => 'Apple Watch Series 9',
                'price' => 450.00,
                'stock_quantity' => 15,
            ],
            [
                'name' => 'AirPods Pro',
                'price' => 280.00,
                'stock_quantity' => 20,
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'price' => 380.00,
                'stock_quantity' => 7,
            ],
            [
                'name' => 'PlayStation 5',
                'price' => 600.00,
                'stock_quantity' => 4, // low stock (korisno za job test)
            ],
            [
                'name' => 'Xbox Series X',
                'price' => 580.00,
                'stock_quantity' => 3, // low stock
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
