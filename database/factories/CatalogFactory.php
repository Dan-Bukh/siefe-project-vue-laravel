<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CatalogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => 'soap',
            'title' => fake()->word(),
            'price' => rand(3, 6),
            'count' => rand(3, 6),
            'content' => array([0 => fake()->realText(100), 1 => fake()->realText(), 3 => fake()->realText(300)]),
            'image' => 'images/' . rand(1, 8) . '.jpg' . '&' . 'images/' . rand(1, 8) . '.jpg',
        ];
    }
}
