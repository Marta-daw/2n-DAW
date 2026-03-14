<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TascaController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasques', TascaController::class);
Route::resource('categories', CategoriaController::class);

Route::get('/tasques', [TascaController::class, 'index'])->name('tasques.index');
Route::get('/tasques/create', [TascaController::class, 'create'])->name('tasques.create');
Route::post('/tasques', [TascaController::class, 'store'])->name('tasques.store');
Route::get('/tasques/{tasca}', [TascaController::class, 'show'])->name('tasques.show');
Route::get('/tasques/{tasca}/edit', [TascaController::class, 'edit'])->name('tasques.edit');
Route::put('/tasques/{tasca}', [TascaController::class, 'update'])->name('tasques.update');
Route::delete('/tasques/{tasca}', [TascaController::class, 'destroy'])->name('tasques.destroy');
