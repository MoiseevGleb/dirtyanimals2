<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->realText(),
            'price' => fake()->randomFloat(2, 1000, 9999),
            'category_id' => fake()->numberBetween(1, 5),
            'image' => fake()->word() . '.jpg'
        ];
    }
}