<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasca;
use App\Models\Categoria;

class TascaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasques = Tasca::with('categoria')->get(); // Recuperem totes les tasques amb les seves categories associades
        return view('tasques.index', compact('tasques')); // Retorna la vista passant-hi les tasques
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categoria::all(); // Recuperem totes les categories per mostrar-les al formulari de creació de tasques
        return view('tasques.create', compact('categories')); // Retorna la vista de creació de tasques passant-hi les categories
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validem les dades rebudes del formulari
        $request->validate([
            'titol' => 'required|string|max:255',
            'descripcio' => 'nullable|string',
            'prioritat' => 'required|in:baixa,mitjana,alta',
            'stat' => 'required|in:pendent,en_curs,completada',
            'category_id' => 'required|exists:categories,id',
        ]);

        Tasca::create($request->all()); // Crea una nova tasca amb les dades validades
        return redirect()->route('tasques.index'); // Redirigeix a la llista de tasques
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Recuperem la tasca amb la seva categoria
        $tasca = Tasca::with('categoria')->findOrFail($id);

        //Retorna la vista passant-hi la tasca
        return view('tasques.show', compact('tasca'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tasca = Tasca::findOrFail($id); // Recuperem la tasca que volem editar
        $categories = Categoria::all(); // Recuperem totes les categories per mostrar-les al formulari d'edició de tasques
        return view('tasques.edit', compact('tasca', 'categories')); // Retorna la vista d'edició de tasques passant-hi la tasca i les categories
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validem les dades rebudes del formulari
        $request->validate([
            'titol' => 'required',
            'descripcio' => 'nullable',
            'prioritat' => 'required',
            'stat' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $tasca = Tasca::findOrFail($id); // Recuperem la tasca que volem actualitzar
        $tasca->update([
            'titol' => $request->titol,
            'descripcio' => $request->descripcio,
            'prioritat' => $request->prioritat,
            'stat' => $request->stat,
            'category_id' => $request->category_id,
        ]); // Actualitzem la tasca amb les dades validades

        return redirect()->route('tasques.index');
        //return redirect()->route('tasques.index')->with('success', 'Tasca actualitzada correctament');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tasca = Tasca::findOrFail($id); // Recuperem la tasca que volem eliminar
        $tasca->delete(); // Eliminem la tasca de la base de dades
        return redirect()->route('tasques.index'); // Redirigeix a la llista de tasques després d'eliminar
    }
}
