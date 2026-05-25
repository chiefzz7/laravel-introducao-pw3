<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy('nome')->get();
        return view('produtos.index', compact('produtos'));
    }

    public function Store(Request $res)
    {
        $dados = $res->validate([
            'nome' => 'required|min:3',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
        ]);

        Produto::create($dados);

        return redirect('/produtos');
    }
}
