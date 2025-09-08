<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí registras todas tus rutas web.
*/

// 1. Redirige la ruta raíz al índice de libros
Route::get('/', function () {
    return redirect()->route('book.index');
});

// 2. Agrupa las rutas que requieren autenticación
Route::middleware(['auth'])->group(function () {
     // Dashboard “oficial” de Breeze
    Route::get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

      // Ruta para mostrar formulario de edición de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');



    // CRUD completo para BookController
    Route::resource('book', BookController::class);
    // Ruta adicional para reservar un libro
    Route::post('book/{book}/reserve', [BookController::class, 'reserve'])
        ->name('book.reserve');
});


// 3) Carga aquí todas las rutas de login, register, etc., que creó Breeze
require __DIR__.'/auth.php';