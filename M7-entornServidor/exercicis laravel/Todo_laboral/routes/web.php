<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TascaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TreballadorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasques', TascaController::class);
Route::resource('categories', CategoriaController::class);
Route::resource('treballadors', TreballadorController::class);

Route::get('/tasques', [TascaController::class, 'index'])->name('tasques.index');
Route::get('/tasques/create', [TascaController::class, 'create'])->name('tasques.create');
Route::post('/tasques', [TascaController::class, 'store'])->name('tasques.store');
Route::get('/tasques/{tasca}', [TascaController::class, 'show'])->name('tasques.show');
Route::get('/tasques/{tasca}/edit', [TascaController::class, 'edit'])->name('tasques.edit');
Route::put('/tasques/{tasca}', [TascaController::class, 'update'])->name('tasques.update');
Route::delete('/tasques/{tasca}', [TascaController::class, 'destroy'])->name('tasques.destroy');

Route::get('/treballadors', [TreballadorController::class, 'index'])->name('treballadors.index');
Route::get('/treballadors/create', [TreballadorController::class, 'create'])->name('treballadors.create');
Route::post('/treballadors', [TreballadorController::class, 'store'])->name('treballadors.store');
Route::get('/treballadors/{treballador}', [TreballadorController::class, 'show'])->name('treballadors.show');
Route::get('/treballadors/{treballador}/edit', [TreballadorController::class, 'edit'])->name('treballadors.edit');
Route::put('/treballadors/{treballador}', [TreballadorController::class, 'update'])->name('treballadors.update');
Route::delete('/treballadors/{treballador}', [TreballadorController::class, 'destroy'])->name('treballadors.destroy');
