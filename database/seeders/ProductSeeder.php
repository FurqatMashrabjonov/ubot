<?php

namespace Database\Seeders;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nwidart\Modules\Facades\Module;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Main Bot',
                'description' => 'Main Bot Description',
                'is_default' => true,
                'category_id' => 1,
                'module_name' => 'MainBot',
                'status' => ProductStatusEnum::ACTIVE,
            ],
            [
                'name' => 'Gemini Ai Bot',
                'description' => 'This is a Gemini Ai Bot that can be used to generate Ai content',
                'is_default' => false,
                'category_id' => 2,
                'module_name' => 'GeminiAiBot',
                'status' => ProductStatusEnum::ACTIVE,
            ],
        ];

        Product::query()->insert($products);
    }
}

//
//rasm va videolarni telegramdan olamiz va databasega saqlimiz
//saqlangan rasmlardan productlar uchun foydalanamiz
//chatlar product tanlashi kerak va saqlashi kerak
//swticherni optimmlashtirish
//productlarni tanlash uchun webapp tayyorlash shadcn bilan
