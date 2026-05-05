<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController; // السطر ده هو اللي كان ناقص ومسبب الإيرور

// الصفحة الرئيسية (البحث والمكونات)
Route::get('/', [RecipeController::class, 'index'])->name('home');

// صفحة تفاصيل الأكلة (الطريقة والمكونات كاملة)
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');
