<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
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


// Rota da listagem e painel administrativo (GET)
Route::get('/admin', [UserController::class, 'index']);

// Rotas de criação / cadastro
Route::get('/usuarios/novo', [UserController::class, 'create']);
Route::post('/usuarios', [UserController::class, 'store']);

// Rotas de edição e atualização
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);

// Rotas de exclusão
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);
