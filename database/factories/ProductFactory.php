<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'title' => fake()->unique()->sentence(3),
            'price' => fake()->numberBetween(5000, 90000),
            'quantity' => fake()->numberBetween(1, 200),
            'previewImage' => fake()->imageUrl(),
            'description' => fake()->paragraph(),
            'category_id' => Category::all()->pluck('id')->random(),
        ];
    }
}
