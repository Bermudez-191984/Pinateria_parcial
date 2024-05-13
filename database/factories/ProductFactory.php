<?php

namespace Database\Factories;

use App\Models\Product; 
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
            'name' => $this->faker->word, 
            'amount' => $this->faker->randomNumber(2), 
            'description' => $this->faker->word, 
            'reference' => $this->faker->randomNumber(2), 
            'price' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
