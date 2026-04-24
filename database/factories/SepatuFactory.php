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
            'brand' => fake()->name(),
            'size' => fake()->numery('##'),
            'price' => fake()->name(),
            'stock' => fake()->name(),
        ];  
    }
}
