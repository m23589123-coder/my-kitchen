<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. جدول الوصفات
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // اسم الأكلة
            $table->text('instructions'); // طريقة التحضير
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // 2. جدول المكونات
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المكون (بيض، دقيق...)
            $table->timestamps();
        });

        // 3. جدول الربط الذكي
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained('recipes')->onDelete('cascade');
            $table->foreignId('ingredient_id')->constrained('ingredients')->onDelete('cascade');
            $table->string('amount')->nullable(); // الكمية
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipe_ingredient');
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('recipes');
    }
};
