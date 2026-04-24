<?php

namespace Database\Seeders;

use App\Models\sepatu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SepatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        sepatu::factory()->count(100)->create();
    }
}
