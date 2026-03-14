<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all(); // Recuperem tots els posts de la base de dades
        return view('posts.index', compact('posts')); // Retorna la vista passant-hi els posts
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = auth()->id(); // Recuperem l'ID de l'usuari autenticat
        return view('posts.create', compact('user')); // Retorna la vista de creació de posts passant l'ID de l'usuari
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titol' => 'required|string|max:255',
            'contingut' => 'required|string',
            'user_id' => 'required|exists:users,id', // Validem que l'ID de l'usuari existeix a la taula users
        ]);

        Post::create($request->all()); // Crea un nou post amb les dades validades
        return redirect()->route('posts.index'); // Redirigeix a la llista de posts
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::with('user')->findOrFail($id); // Recuperem el post amb la seva relació amb l'usuari
        return view('posts.show', compact('post')); // Retorna la vista passant-hi el post
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id); // Recuperem el post que volem editar
        return view('posts.edit', compact('post')); // Retorna la vista de edició de posts passant-hi el post a editar
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'titol' => 'required|string|max:255',
            'contingut' => 'required|string',
            'user_id' => 'required|exists:users,id', // Validem que l'ID de l'usuari existeix a la taula users
        ]);

        $post = Post::findOrFail($id); // Recuperem el post que volem actualitzar
        $post->update([
            'titol' => $request->titol,
            'contingut' => $request->contingut,
            'user_id' => $request->user_id,
        ]); // Actualitzem el post amb les dades validades

        return redirect()->route('posts.index'); // Redirigeix a la llista de posts
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id); // Recuperem el post que volem eliminar
        $post->delete(); // Eliminem el post de la base de dades
        return redirect()->route('posts.index'); // Redirigeix a la llista
    }
}
