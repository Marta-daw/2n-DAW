<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Premi;

class SorteigController extends Controller
{
    public function index()
    {
        // 1. Recuperar el dni de totes les persones 
        $persones = Persona::select('dni')->get();

         // 2. Assignar un número aleatori a cada persona
        /* $personesAlea = $persones->map(function ($persona) {
            $persona->nombre = rand(1, 100);
            return $persona;
        }); */

        // Recuperar premios i assignarlo de forma aleatoria a cada persona
        $premis = Premi::select('nom')->get();
        $personesAlea = $persones->map(function ($persona) use ($premis) {
            $persona->premi = $premis->random(); // Assigna un premi aleatori a cada persona
            return $persona;
        });

        // 3. Enviar les dades a la vista
        return view('sorteig', [
            'persones' => $personesAlea
        ]);
    }
}
