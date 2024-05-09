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
        // Recebe o que foi digitado pelo usuário
        $search = $request->input('search');
        //Recebe o ID da categoria
        $categoria_id = $request->get('categoria_id');

        // Verifica se a checkbox de promoção foi checkada
        $isPromotionChecked = $request->has('promotion_checkbox');

        // Verifica se foi passado algum valor na pesquisa
        if ($search) {

            // Consulta base
            $query = Produto::where('PRODUTO_ATIVO', 1)
                ->where(function ($q) use ($search) {
                    $q->where('PRODUTO_NOME', 'like', '%' . $search . '%')
                        ->orWhere('PRODUTO_DESC', 'like', '%' . $search . '%');
                });

            if ($categoria_id) {
                $query->where('CATEGORIA_ID', $categoria_id);
            }

            if ($isPromotionChecked === true) {
                $query->where('PRODUTO_DESCONTO', '>', 0);
            } 
            
            //Exibe apenas 12 produtos por página    
            $produtos = $query->paginate(12)->withQueryString();

            // Busca todas as categorias ativas
            $categorias = Categoria::where('CATEGORIA_ATIVO', 1)->get();

            // Conta quantos produtos foram achados na busca
            $qtdProdutos = $produtos->total();

            return view('produto.search', [
                'search' => $search,
                'categorias' => $categorias,
                'qtdProdutos' => $qtdProdutos,
                'produtos' => $produtos
            ]);
        } else {
            // Exibe uma mensagem de erro
            return redirect()->back()->with('error', 'Nenhum termo de pesquisa foi inserido.');
        }
    }
}
