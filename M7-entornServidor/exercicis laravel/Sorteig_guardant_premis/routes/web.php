<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SorteigController;
use App\Http\Controllers\ParticipantsController;

/* Route::get('/', function () {
    return view('welcome');
}); */

// Route::get('/', [SorteigController::class, 'index']);
Route::get('/premis', [SorteigController::class, 'index']);
Route::get('/participants', [ParticipantsController::class, 'index']);