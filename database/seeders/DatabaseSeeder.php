<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // هنا بننادي على الـ RecipeSeeder اللي إنت لسه مكريته
        $this->call([
            RecipeSeeder::class,
        ]);

        // لو حابب تكريت مستخدمين تجريبيين في المستقبل سيب السطر ده
        // User::factory(10)->create();
    }
}
