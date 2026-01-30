<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Unit;
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
        $purchasePrice = fake()->numberBetween(1000, 500000);
        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'unit_id' => Unit::inRandomOrder()->first()->id ?? 1,
            'name' => fake()->words(3, true),
            'sku' => fake()->unique()->bothify('PRD-####-????'),
            'purchase_price' => $purchasePrice,
            'retail_price' => $purchasePrice * 1.2, // 20% margin
            'description' => fake()->paragraph(),
        ];
    }
}
