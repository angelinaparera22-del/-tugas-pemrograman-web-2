<?php

namespace Database\Factories;

use App\Models\sepatu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<sepatu>
 */
class SepatuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'brand' => fake()->company(),
            'size' => fake()->numberBetween(35, 45),
            'price' => fake()->numberBetween(100000, 1000000),
            'stock' => fake()->numberBetween(1, 100),
        ];  
    }
}
