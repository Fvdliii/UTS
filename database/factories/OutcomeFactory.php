<?php

namespace Database\Factories;

use App\Models\Income;
use App\Models\Outcome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Outcome>
 */
class OutcomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'income_id' => Income::factory(),
            'outcome' => 'Makan',
            'from' => 'Kantin',
            'nominal' => 20000,
            'tanggal_outcome' => now()->toDateString(),
            'description' => 'Makan siang',
        ];
    }
}
