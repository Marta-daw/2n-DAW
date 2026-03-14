<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Aquesta línia falta

class TreballadorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('treballadors')->insert([
            ['dni' => '12345678A', 'nom' => 'Marta', 'cognoms1' => 'García', 'cognoms2' => 'López', 'correu' => 'martaGL@gmail.com', 'telefon' => '612345678'],
            ['dni' => '87654321B', 'nom' => 'Joan', 'cognoms1' => 'Pérez', 'cognoms2' => 'Sánchez', 'correu' => 'joanPS@gmail.com', 'telefon' => '698765432'],
        ]);

        DB::table('tasca_treballador')->insert([
            ['treballador_dni' => '12345678A', 'tasca_id' => 2],
            ['treballador_dni' => '12345678A', 'tasca_id' => 4],
            ['treballador_dni' => '87654321B', 'tasca_id' => 3],
        ]);
    }
}
