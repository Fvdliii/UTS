<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Income;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incomes')->insert([
            'income' => 'Cash',
            'from' => 'Permingguan',    
            'nominal' => 50000,
            'tanggal_income' => '2026-05-15',
        ]);
    }
}
