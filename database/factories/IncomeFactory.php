<?php

namespace Database\Factories;

use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'income' => 'Mingguan',
        'from' => 'Orang Tua',
        'nominal' => 500000,
        'tanggal_income' => now(),
    ];
    }
}
