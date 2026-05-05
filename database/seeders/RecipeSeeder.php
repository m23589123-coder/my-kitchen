<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        // الحروف اللي هنسحب بيها الأكلات من الـ API عشان نعدي الـ 150 أكلة
        $letters = range('a', 'z');
        $recipesCount = 0;

        foreach ($letters as $letter) {
            if ($recipesCount >= 150) break; // لو وصلنا 150 نوقف سحب

            // الاتصال بـ API الأكل العالمي
            $response = Http::get("https://www.themealdb.com/api/json/v1/1/search.php?f={$letter}");
            $data = $response->json();

            if (!empty($data['meals'])) {
                foreach ($data['meals'] as $meal) {
                    if ($recipesCount >= 150) break 2; // كسر اللوب بالكامل

                    // بناء الأكلة بصورة حقيقية 100% من سيرفرات قوية مش بتكسر
                    $recipe = Recipe::create([
                        'title' => $meal['strMeal'],
                        'image_url' => $meal['strMealThumb'], // رابط الصورة الأصلي المضمون
                        'price' => rand(150, 800),
                        'calories' => rand(300, 1200),
                        'description' => $meal['strInstructions'], // خطوات الطبخ بالتفصيل
                        'category' => $meal['strCategory']
                    ]);

                    // API بيبعت المكونات في 20 حقل، بنلف عليهم وناخد اللي مليان بس
                    for ($i = 1; $i <= 20; $i++) {
                        $ingredientName = $meal["strIngredient{$i}"];
                        // نتأكد إن المكون مش فاضي
                        if (!empty(trim($ingredientName))) {
                            Ingredient::create([
                                'name' => trim($ingredientName),
                                'recipe_id' => $recipe->id
                            ]);
                        }
                    }
                    $recipesCount++;
                }
            }
        }
    }
}
