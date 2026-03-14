<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class ParticipantsController extends Controller
{
    public function index()
    {
        // Recuperar tota la informació de totes les persones 
        $persones = Persona::all();

         /* // 2. Assignar un número aleatori a cada persona
        $personesAlea = $persones->map(function ($persona) {
            $persona->nombre = rand(1, 100);
            return $persona;
        }); */

        // Enviar les dades a la vista
        return view('participants', [
            'persones' => $persones
        ]);
    }
}