<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Aquesta línia falta

class PremiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('premis')->insert([
            'nom' => 'Premio ' . $i,
            'valor' => rand(10, 9999)
            ]);
        }
    }
}
