<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    /**
     * تفعيل ميزة الـ Factory لتوليد الـ 1000 أكلة اللي اتفقنا عليهم
     */
    use HasFactory;

    /**
     * الحقول المسموح بتعديلها (Mass Assignment)
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'image_url'
    ];

    /**
     * العلاقة بين الأكلة والمكونات (One-to-Many)
     * الأكلة الواحدة (Recipe) ليها مكونات كتير (Ingredients)
     */
    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }
}
