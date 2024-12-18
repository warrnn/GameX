<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_pool = [
            'Action',
            'Sports',
            'Racing',
            'Sci-Fi',
            'Horror',
            'Survival',
        ];

        foreach ($category_pool as $category) {
            Categories::create([
                'name' => $category,
            ]);
        }
    }
}
