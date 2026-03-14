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

        // Recuperar premios i assignarlo de forma aleatoria a cada persona
        $premis = Premi::select('nom')->get();
        $personesAlea = $persones->map(function ($persona) use ($premis) {
            $persona->premis = $premis->random(); // Assigna un premi aleatori a cada persona
            $persona->save(); // Guarda els canvis a la base de dades
            return $persona;
        });

        // 3. Enviar les dades a la vista
        return view('sorteig', [
            'persones' => $personesAlea
        ]);
    }
}
