<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;


class produtoController extends Controller
{
    public function index()
    {
        //Recebe do banco apenas os produtos ativos
        $produtos = Produto::where('PRODUTO_ATIVO', '=', 1)->get();

        return view('produto.index', ['produtos' => $produtos]);
    }


    public function search(Request $request)
    {
        // Receba a entrada do usuário na barra de pesquisa
        $search = $request->input('search');

        // Verifique se o usuário digitou algo e traga do banco
        if ($search) {
            // Consulta base de produtos
            $query = Produto::where('PRODUTO_NOME', 'like', '%' . $search . '%')
                ->orWhere('PRODUTO_DESC', 'like', '%' . $search . '%')
                ->where('PRODUTO_ATIVO', '=', 1);

            // Verifique se há categorias selecionadas
            $categoriasSelecionadas = $request->input('categorias');

            // Se houver categorias selecionadas, os filtros serão aplicados
            if (!empty($categoriasSelecionadas)) {
                $query->whereHas('categorias', function ($query) use ($categoriasSelecionadas) {
                    $query->whereIn('CATEGORIA_ID', $categoriasSelecionadas);
                });
            }

            // Execute a consulta
            $produtos = $query->paginate(12)->withQueryString();

            // Obtenha todas as categorias ativas
            $categorias = Categoria::where('CATEGORIA_ATIVO', '=', 1)->get();

            // Conte quantos produtos foram encontrados
            $quantidadeProdutos = $produtos->total();
        } else {
            return redirect()->route('produto.index');
        }

        return view('produto.search', [
            'produtos' => $produtos,
            'quantidadeProdutos' => $quantidadeProdutos,
            'categorias' => $categorias,
            'search' => $search
        ]);
    }
}
