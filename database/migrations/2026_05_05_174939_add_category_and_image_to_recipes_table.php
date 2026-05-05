<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            // بنضيف العواميد اللي ناقصة
            if (!Schema::hasColumn('recipes', 'category')) {
                $table->string('category')->nullable()->after('price');
            }
            if (!Schema::hasColumn('recipes', 'image_url')) {
                $table->string('image_url')->nullable()->after('category');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn(['category', 'image_url']);
        });
    }
};
