<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;       // لازم نستدعي الموديل ده
use App\Models\Ingredient;   // ولازم نستدعي الموديل ده

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        // 1. هنجيب كل المكونات المتاحة عشان نعرضها في الفلتر (الثلاجة)
        $allIngredients = Ingredient::distinct()->pluck('name');

        // 2. هنبدأ استعلام عن الأكلات
        $query = Recipe::with('ingredients');

        // 3. ذكاء الاصطناعي للبحث (لو المستخدم اختار مكونات من ثلاجته)
        if ($request->has('my_ingredients')) {
            $selected = $request->my_ingredients;
            foreach ($selected as $ing) {
                // بنجيب الأكلة اللي فيها "كل" المكونات اللي اخترتها
                $query->whereHas('ingredients', function($q) use ($ing) {
                    $q->where('name', $ing);
                });
            }
        }

        $recipes = $query->get();

        return view('welcome', compact('recipes', 'allIngredients'));
    }

    public function show($id)
    {
        // صفحة عرض تفاصيل الأكلة الواحدة
        $recipe = Recipe::with('ingredients')->findOrFail($id);
        return view('show', compact('recipe'));
    }
}
