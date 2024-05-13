<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\_Order>
 */
class _OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'remark' => $this->faker->word, 
            'id_customer' => \App\Models\Customer::factory(), 
        ];
    }
}
