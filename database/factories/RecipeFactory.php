<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => 'أكلة مؤقتة', // الـ Seeder هيغيرها للعربي
            'image_url' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=500', // صورة افتراضية جودتها عالية
            'price' => rand(80, 600),
            'calories' => rand(300, 1500),
            'category' => collect(['غداء', 'عشاء', 'فطور'])->random(),
            'description' => 'وصف تفصيلي لأكلة شهية ومغذية من مطبخ AklaWorld.',
        ];
    }
}
