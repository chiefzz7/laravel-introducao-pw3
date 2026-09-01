<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
     * Exibe o formulário de cadastro de usuários
     */
    public function create()
    {
        return view('users.create');
    }


    /**
     * Salvar nvoo usuário no banco de dados com validação
     */
    public function store(Request $req)
    {
        // Validação dos dados (campos) do Formulário
        $dadosValidados = $req->validate([
            'nome' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        // Persistência no banco de dados usando o ORM Eloquent
        User::create($dadosValidados);

        
        // Redirecionar para o painel administrativo com mensagem de sucesso
        return redirect('/admin')->with('sucess', 'Usuário cadastrado com sucesso');
    }
}
