<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outcomes')->insert([
            'outcome' => 'Cash',
            'from' => 'Makan',    
            'nominal' => 50000,
            'tanggal_outcome' => '2026-05-15',
            'description' => 'Makan siang',
            'income_id' => 1,
        ]);
    }
}
