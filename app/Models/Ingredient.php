<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    // دي الخطوة اللي ناقصاك، بنعرف لارفيل إن الأعمدة دي مسموح نكتب فيها بيانات
    protected $fillable = [
        'name',
        'recipe_id',
        'amount'
    ];

    // علاقة المكون بالأكلة (المكون ينتمي لأكلة واحدة)
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
