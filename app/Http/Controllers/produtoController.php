<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class produtoController extends Controller
{
    public function index()
    {
        // Consulta base
        $queryBase = Produto::where('PRODUTO_ATIVO', 1)
            ->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) > 0');

        // Últimos produtos cadastrados
        $produtoLancamentos = (clone $queryBase)->orderBy('PRODUTO_ID', 'desc')
            ->take(12)
            ->get();

        // Produtos em oferta
        $produtoOfertas = (clone $queryBase)->where('PRODUTO_DESCONTO', '>', 0)
            ->orderBy('PRODUTO_DESCONTO', 'desc')
            ->take(12)
            ->get();

        return view('produto.index', [
            'produtoLancamentos' => $produtoLancamentos,
            'produtoOfertas' => $produtoOfertas,
        ]);
    }

    public function search(Request $request)
    {
        //Recebe o que foi digitado pelo usuário
        $search = $request->input('search');

        //Recebe o ID da categoria
        $categoria_id = $request->get('categoria_id');

        //Verifica se a checkbox de promoção foi checkada
        $isPromotionChecked = $request->has('promotion_checkbox');

        //Recebe um dos filtros do dropdown
        $dropdownFilter = $request->get('dropdownFilter');

        //Recebe o input de maior e menor valor
        $minValueInput = $request->get('minValue');
        $maxValueInput = $request->get('maxValue');

        //Verica se Lançamentos foi clicado
        $produtoLancamentos = $request->get('produtoLancamentos');

        // Verifica se foi passado algum valor na pesquisa
        if ($search) {

            // Consulta base
            $query = Produto::where('PRODUTO_ATIVO', 1)
                ->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) > 0')
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

            //Filtro e ordenação dropdown
            if ($dropdownFilter) {
                switch ($dropdownFilter) {
                    case 'maisVendidos':
                        $produtos = Produto::select('PRODUTO.*', DB::raw('COUNT(PEDIDO_ITEM.PRODUTO_ID) AS total_vendas'))
                            ->leftJoin('PEDIDO_ITEM', 'PRODUTO.PRODUTO_ID', '=', 'PEDIDO_ITEM.PRODUTO_ID')
                            ->groupBy('PRODUTO.PRODUTO_ID')
                            ->orderByDesc('total_vendas');
                        break;
                    case 'maiorPreco':
                        $query->orderByRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) DESC');
                        break;
                    case 'menorPreco':
                        $query->orderByRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) ASC');
                        break;
                }
            }

            //Filtrar por preço
            if ($minValueInput || $maxValueInput) {
                $query->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) >= ?', [$minValueInput])
                    ->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) <= ?', [$maxValueInput]);
            }

            // Verifica se $produtoLancamentos é verdadeiro
            if ($produtoLancamentos) {
                // Filtra pelos últimos 12 produtos
                $ultimosProdutos = $query->orderBy('PRODUTO_ID', 'desc')->take(12)->get();

                // Pagina a coleção de 12 produtos
                $produtos = new \Illuminate\Pagination\LengthAwarePaginator(
                    $ultimosProdutos,
                    count($ultimosProdutos),
                    12,
                    null,
                    ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
                );
            } else {
                // Pagina a consulta com 12 produtos por página
                $produtos = $query->paginate(12)->withQueryString();
            }

            //Busca todas as categorias ativas
            $categorias = Categoria::where('CATEGORIA_ATIVO', 1)->get();

            //Busca o maior valor dos produtos
            $maxValue = Produto::max('PRODUTO_PRECO');

            // Conta quantos produtos foram achados na busca
            $qtdProdutos = $produtos->total();

            return view('produto.search', [
                'search' => $search,
                'categorias' => $categorias,
                'qtdProdutos' => $qtdProdutos,
                'produtos' => $produtos,
                'maxValue' => $maxValue
            ]);
        } else {
            // Exibe uma mensagem de erro
            return redirect()->back()->with('error', 'Nenhum termo de pesquisa foi inserido.');
        }
    }

    //metedo exibir
    public function show(Produto $produto)
    {
        return view('produto.show', ['produto' => $produto]);
    }
}
