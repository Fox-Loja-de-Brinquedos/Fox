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

        //Recebe um dos filtros do dropdown
        $dropdownFilter = $request->get('dropdownFilter');

        // Verifica se foi passado algum valor na pesquisa
        if ($search) {

            // Consulta base
            $query = Produto::where('PRODUTO_ATIVO', 1)
                ->where(function ($q) use ($search) {
                    $q->where('PRODUTO_NOME', 'like', '%' . $search . '%')
                        ->orWhere('PRODUTO_DESC', 'like', '%' . $search . '%');
                });

            // Filtra por categoria se definido
            if ($categoria_id) {
                $query->where('CATEGORIA_ID', $categoria_id);
            }

            // Filtra por produtos em promocao se definido
            if ($isPromotionChecked  || $dropdownFilter == 'descontos') {
                $query->where('PRODUTO_DESCONTO', '>', 0);
            }

            if ($dropdownFilter) {
                switch ($dropdownFilter) {
                    case 'maisVendidos':
                        break;
                    case 'maiorPreco':
                        $query->orderByRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) DESC');
                        break;
                    case 'menorPreco':
                        $query->orderByRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) ASC');
                        break;
                }
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
