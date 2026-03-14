<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SorteigController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [SorteigController::class, 'index']);