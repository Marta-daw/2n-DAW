<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Aquesta línia falta


class TodoPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            ['nom' => 'Personal', 'descripcio' => 'Tasques relacionades amb la vida personal'],
            ['nom' => 'Treball', 'descripcio' => 'Tasques relacionades amb el treball'],
            ['nom' => 'Oci', 'descripcio' => 'Tasques relacionades amb l\'oci i el temps lliure'],
        ]);

        DB::table('tasques')->insert([
            ['titol' => 'Comprar menjar', 'descripcio' => 'Comprar menjar per a la setmana', 'prioritat' => 'alta', 'stat' => 'pendent', 'category_id' => 1],
            ['titol' => 'Reunió amb el cap', 'descripcio' => 'Reunió setmanal amb el cap per revisar projectes', 'prioritat' => 'mitjana', 'stat' => 'en_curs', 'category_id' => 2],
            ['titol' => 'Anar al cinema', 'descripcio' => 'Veure la nova pel·lícula al cinema aquest cap de setmana', 'prioritat' => 'baixa', 'stat' => 'pendent', 'category_id' => 3],
        ]);
    }
}
