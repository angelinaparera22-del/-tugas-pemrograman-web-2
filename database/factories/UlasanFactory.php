<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use App\Models\Ulasan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ulasan>
 */
class UlasanFactory extends Factory
{
    protected $model = Ulasan::class;

    public function definition(): array
    {
        return [
            'pelanggan_id'   => Pelanggan::inRandomOrder()->first()?->id ?? Pelanggan::factory(),
            'nama_sepatu'    => $this->faker->word(),
            'rating'         => $this->faker->numberBetween(1, 5),
            'komentar'       => $this->faker->sentence(),
            'tanggal_ulasan' => $this->faker->date(),
            'status'         => $this->faker->randomElement(['pending', 'approved']),
        ];
    }
}
