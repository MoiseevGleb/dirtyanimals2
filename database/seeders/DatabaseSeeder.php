<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\NewsComment;
use App\Models\Product;
use App\Models\User;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(rand(3,5))->create();

        Product::factory(rand(30, 50))->create()->each(function (Product $product) use ($categories) {
            $product->categories()->attach($categories->random(3));
        });

        User::factory(rand(3, 10))->admin()->create()->each(function ($user) {

            $news = News::factory(rand(5,10))->create(['user_id' => $user->id]);

            $news->each(function ($news) use ($user) {
                Comment::factory(rand(5,15))->create([
                    'user_id' => $user->id,
                    'commentable_type' => 'App\Models\News',
                    'commentable_id' => $news->id,
                ]);
            });

        });
    }
}
