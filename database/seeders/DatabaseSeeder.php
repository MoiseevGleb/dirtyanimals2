<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsComment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        Product::factory(100)->create();

        News::factory(10)->create();
        //NewsComment::factory(68)->create();
    }
}
