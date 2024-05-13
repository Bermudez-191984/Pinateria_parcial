<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailOrder>
 */
class DetailOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomNumber(2), 
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'subtotal' => $this->faker->randomFloat(2, 0, 1000),
            'id_product' => \App\Models\Product::factory(), 
            'id__order' => \App\Models\_Order::factory(), 
        ];
    }
}
