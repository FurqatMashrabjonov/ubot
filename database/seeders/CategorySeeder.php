<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Custom',
                'slug' => 'custom',
            ],
            [
                'name' => 'AI',
                'slug' => 'ai',
            ],
        ];

        Category::query()->insert($categories);
    }
}
