<?php

namespace Database\Seeders;

use App\Models\Admin\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Smartphone',
            'description' => 'Latest model smartphone with advanced features',
            'stock_keeping_unit' => 'SKU001',
            'price' => 699.99,
            'quantity_in_stock' => 10,
            'category_id' => 1, // Assuming category_id 1 exists
        ]);

        Product::create([
            'name' => 'Sofa',
            'description' => 'Comfortable leather sofa',
            'stock_keeping_unit' => 'SKU002',
            'price' => 899.99,
            'quantity_in_stock' => 5,
            'category_id' => 2, // Assuming category_id 2 exists
        ]);

        Product::create([
            'name' => 'T-Shirt',
            'description' => 'Cotton t-shirt with logo',
            'stock_keeping_unit' => 'SKU003',
            'price' => 19.99,
            'quantity_in_stock' => 100,
            'category_id' => 3, // Assuming category_id 3 exists
        ]);

    }
}
