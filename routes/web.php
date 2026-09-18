<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LivroController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EventoController;

use App\Models\User;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('admin', 'admin/dashboard');

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);

Route::get('/teste-orm', function() {
    User::create([
        'name' => 'Ana Clara Santos',
        'email' => 'ana.santos@escola.sp.gov.br',
        'password' => '123456'
    ]);

    return User::all();
});

// Route::get('/busca', function() {
//     return User::all();
// });


// Rotas da Agenda de Eventos
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/novo', [EventoController::class, 'create']);
Route::post('/eventos', [EventoController::class, 'store']);
