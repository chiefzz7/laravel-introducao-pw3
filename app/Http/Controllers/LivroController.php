<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::orderBy('id')->get();
        return view('livros.index', compact('livros'));
    }

    public function Store(Request $res)
    {
        $dados = $res->validate([
            'titulo' => 'required|min:2',
            'autor' => 'required|min:3',
            'ano_publicacao' => 'required|integer|min:0',
        ]);

        Livro::create($dados);

        return redirect('/livros');
    }
}
