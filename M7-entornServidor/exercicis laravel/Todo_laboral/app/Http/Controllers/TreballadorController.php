<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treballador;
use App\Models\Tasca;
use App\Models\Categoria;

class TreballadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $treballadors = Treballador::with('tasques')->get(); // Recuperem tots els treballadors amb les seves tasques associades
        return view('treballadors.index', compact('treballadors')); // Retorna la vista passant-hi els treballadors
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tasques = Tasca::all(); // Recuperem totes les tasques per mostrar-les al formulari de creació de treballadors
        return view('treballadors.create', compact('tasques')); // Retorna la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validem les dades rebudes del formulari
        $request->validate([
            'dni' => 'required|string|max:255|unique:treballadors,dni',
            'nom' => 'required|string|max:255',
            'cognoms1' => 'required|string|max:255',
            'cognoms2' => 'nullable|string|max:255',
            'correu' => 'required|email|max:255|unique:treballadors,correu',
            'telefon' => 'required|string|max:20',
        ]);

        Treballador::create($request->all()); // Crea un nou treballador amb les dades validades
        return redirect()->route('treballadors.index'); // Redirigeix a la llista de treballadors
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $treballadors = Treballador::with('tasques')->findOrFail($id); // Recuperem el treballador amb les seves tasques associades
        return view('treballadors.show', compact('treballadors')); // Retorna la
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $treballador = Treballador::findOrFail($id); // Recuperem el treballador a editar
        $tasques = Tasca::all(); // Recuperem totes les tasques per mostrar
        return view('treballadors.edit', compact('treballador', 'tasques')); // Retorna la vista de edició de treballadors passant-hi el treballador i les tasques
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'dni' => 'required|string|max:255|unique:treballadors,dni,' . $id . ',dni',
            'nom' => 'required|string|max:255',
            'cognoms1' => 'required|string|max:255',
            'cognoms2' => 'nullable|string|max:255',
            'correu' => 'required|email|max:255|unique:treballadors,correu,' . $id . ',dni',
            'telefon' => 'required|string|max:20',
        ]);

        $treballador = Treballador::findOrFail($id); // Recuperem el treballador a editar
        $treballador->update([
            'dni' => $request->dni,
            'nom' => $request->nom,
            'cognoms1' => $request->cognoms1,
            'cognoms2' => $request->cognoms2,
            'correu' => $request->correu,
            'telefon' => $request->telefon,
        ]); // Actualitzem el treballador

        return redirect()->route('treballadors.index'); // Redirigeix a la llista de treballadors
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $treballador = Treballador::findOrFail($id); // Recuperem el treballador a eliminar
        $treballador->delete(); // Elimina el treballador de la base de dades
        return redirect()->route('treballadors.index'); // Redirigeix a la llista de treballadors després d'eliminar
    }
}
