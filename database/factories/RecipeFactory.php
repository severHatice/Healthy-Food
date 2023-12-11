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
            'title' => $this->faker->sentence(),
            'total_calories' => random_int(200, 1000),
            'total_time' => $this->faker->time(),
            //'images' => $this->faker->image(),
            'category' => 'Breakfast',
            'description' => $this->faker->paragraphs(5, true)
            
        ];
    }
}
