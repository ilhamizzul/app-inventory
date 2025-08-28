<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electronics',
            'description' => 'Devices and gadgets',
            'image' => 'categories/default.jpg'
        ]);

        Category::create([
            'name' => 'Furniture',
            'description' => 'Home and office furniture',
            'image' => 'categories/default.jpg'
        ]);

        Category::create([
            'name' => 'Clothing',
            'description' => 'Men and women clothing',
            'image' => 'categories/default.jpg'
        ]);
    }
}
