<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // السطر ده مهم عشان الـ DB::statement تشتغل

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. تعطيل فحص القيود عشان نعرف نمسح الجداول المرتبطة ببعض
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2. مسح الجدول القديم لو موجود
        Schema::dropIfExists('recipes');

        // 3. بناء الجدول الجديد بكل الأعمدة اللي محتاجينها للعالمية
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // اسم الأكلة
            $table->text('description')->nullable(); // وصف الأكلة (اللي كان عامل مشكلة)
            $table->decimal('price', 8, 2)->default(0); // السعر
            $table->integer('calories')->nullable(); // السعرات الحرارية
            $table->string('image')->nullable(); // رابط الصورة
            $table->timestamps(); // وقت الإنشاء والتحديث
        });

        // 4. إعادة تفعيل فحص القيود بعد ما خلصنا
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
