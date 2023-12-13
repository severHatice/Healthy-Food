<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(4, 26), 
            'title' => $this->faker->sentence,
            'images' => json_encode(['path/to/fake/image.jpg']), 
            'description' => $this->faker->paragraph,
            'total_calories' => $this->faker->numberBetween(100, 1000),
            'total_time' => $this->faker->time(),
            'category' => $this->faker->randomElement(['Breakfast', 'Lunch', 'Dinner', 'Dessert']),
            'is_liked' => $this->faker->numberBetween(0, 100),
            
        ];
    }
}
