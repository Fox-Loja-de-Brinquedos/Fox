<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class produtoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index', ['produtos' => $produtos]);
    }

    public function search()
    {
        $search = request('search');
        $quantidadeProdutos = 0;

        if ($search) {
            $produtos = Produto::where('PRODUTO_NOME', 'like', '%' . $search . '%')
                ->orWhere('PRODUTO_DESC', 'like', '%' . $search . '%')
                ->get();

            $quantidadeProdutos = $produtos->count();
        } else {
            $produtos = Produto::all();
        }

        return view('produto.search', [
            'produtos' => $produtos, 
            'quantidadeProdutos' => $quantidadeProdutos
        ]);
    }


}
