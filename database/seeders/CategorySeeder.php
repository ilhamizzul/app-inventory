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
            'name' => 'Electronics'
        ]);

        Category::create([
            'name' => 'Furniture'
        ]);

        Category::create([
            'name' => 'Clothing'
        ]);
    }
}
