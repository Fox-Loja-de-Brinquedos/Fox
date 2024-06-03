<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\Produto_Estoque;
use Illuminate\Support\Facades\DB;

class produtoController extends Controller
{
    public function index()
    {
        // Consulta base
        $queryBase = Produto::where('PRODUTO_ATIVO', 1)
            ->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) > 0');

        // Últimos produtos cadastrados
        $produtoLancamentos = (clone $queryBase)
            ->latest('PRODUTO_ID')
            ->take(12)
            ->get();

        // Produtos em oferta
        $produtoOfertas = (clone $queryBase)
            ->where('PRODUTO_DESCONTO', '>', 0)
            ->orderByDesc('PRODUTO_DESCONTO')
            ->take(12)
            ->get();

        // Produtos Mais Vendidos
        $produtoMaisVendidos = $queryBase->select(
            'PRODUTO.PRODUTO_ID',
            DB::raw('pi.PRIMEIRA_IMAGEM as PRIMEIRA_IMAGEM'),
            'PRODUTO.PRODUTO_NOME',
            DB::raw('SUM(PEDIDO_ITEM.ITEM_QTD) AS TOTAL_VENDIDO'),
            'PRODUTO.PRODUTO_PRECO',
            'PRODUTO.PRODUTO_DESCONTO'
        )
            ->leftJoin('PEDIDO_ITEM', 'PRODUTO.PRODUTO_ID', '=', 'PEDIDO_ITEM.PRODUTO_ID')
            ->leftJoin(DB::raw('(SELECT PRODUTO_ID, MIN(IMAGEM_ORDEM), MIN(IMAGEM_URL) as PRIMEIRA_IMAGEM FROM PRODUTO_IMAGEM GROUP BY PRODUTO_ID) AS pi'), 'PRODUTO.PRODUTO_ID', '=', 'pi.PRODUTO_ID')
            ->where('PEDIDO_ITEM.ITEM_QTD', '>', 0)
            ->groupBy('PRODUTO.PRODUTO_ID', 'pi.PRIMEIRA_IMAGEM', 'PRODUTO.PRODUTO_NOME', 'PRODUTO.PRODUTO_PRECO', 'PRODUTO.PRODUTO_DESCONTO')
            ->orderByDesc('TOTAL_VENDIDO')
            ->limit(12)
            ->get();

        // Usuário ativo
        $usuarioId = auth()->id();

        // Conta o número de produtos diferentes no carrinho do usuário logado onde a quantidade do item é maior que 0
        $qtdItensCarinho = Carrinho::where('USUARIO_ID', $usuarioId)
            ->where('ITEM_QTD', '>', 0)
            ->distinct('PRODUTO_ID')
            ->count('PRODUTO_ID');

        return view('produto.index', [
            'produtoLancamentos' => $produtoLancamentos,
            'produtoMaisVendidos' => $produtoMaisVendidos,
            'produtoOfertas' => $produtoOfertas,
            'qtdItensCarinho' => $qtdItensCarinho
        ]);
    }


    public function search(Request $request)
    {

        //Usuário ativo
        $usuarioId = auth()->id();

        // Recebe o que foi digitado pelo usuário
        $search = $request->input('search');

        // Verifica se a checkbox de promoção foi checada
        $isPromotionChecked = $request->has('promotion_checkbox');

        // Recebe um dos filtros do dropdown
        $dropdownFilter = $request->get('dropdownFilter');

        // Recebe o input de maior e menor valor
        $minValueInput = $request->get('minValue');
        $maxValueInput = $request->get('maxValue');

        // Verifica se Lançamentos foi clicado
        $produtoLancamentos = $request->get('produtoLancamentos');

        //Verifica qual categoria foi clicada
        $categoriaNome = $request->get('categoriaNome');

        // Verifica se foi passado algum valor na pesquisa
        if ($search) {
            // Consulta base
            $query = Produto::where('PRODUTO_ATIVO', 1)
                ->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) > 0')
                ->where(function ($q) use ($search) {
                    $q->where('PRODUTO_NOME', 'like', '%' . $search . '%')
                        ->orWhere('PRODUTO_DESC', 'like', '%' . $search . '%');
                });


            //Verifica se o usuário clicou na navegação por categoria da index e pega o ID da categoria
            if ($categoriaNome) {
                $categoria_id = Categoria::where('CATEGORIA_NOME', 'LIKE', $categoriaNome)->value('CATEGORIA_ID');
            } else {
                // Verifica qual categoria o usuário clicou
                $categoria_id = $request->get('categoria_id');
            }

            // Filtra por categoria se definido
            if ($categoria_id) {
                $query->where('CATEGORIA_ID', $categoria_id);
            }

            // Filtra por produtos em promoção se definido
            if ($isPromotionChecked || $dropdownFilter == 'descontos') {
                $query->where('PRODUTO_DESCONTO', '>', 0);
            }

            // Filtra e ordena de acordo com o dropdown
            switch ($dropdownFilter) {
                case 'maisVendidos':
                    $query->select(
                        'PRODUTO.PRODUTO_ID',
                        'pi.PRIMEIRA_IMAGEM',
                        'PRODUTO.PRODUTO_NOME',
                        DB::raw('SUM(PEDIDO_ITEM.ITEM_QTD) AS TOTAL_VENDIDO'),
                        'PRODUTO.PRODUTO_PRECO',
                        'PRODUTO.PRODUTO_DESCONTO'
                    )
                        ->leftJoin('PEDIDO_ITEM', 'PRODUTO.PRODUTO_ID', '=', 'PEDIDO_ITEM.PRODUTO_ID') // Ajusta o nome da tabela
                        ->join(DB::raw('(SELECT PRODUTO_ID, MIN(IMAGEM_ORDEM), MIN(IMAGEM_URL) as PRIMEIRA_IMAGEM FROM PRODUTO_IMAGEM GROUP BY PRODUTO_ID) AS pi'), function ($join) {
                            $join->on('PRODUTO.PRODUTO_ID', '=', 'pi.PRODUTO_ID');
                        })
                        ->where('PEDIDO_ITEM.ITEM_QTD', '>', 0)
                        ->groupBy('PRODUTO.PRODUTO_ID', 'pi.PRIMEIRA_IMAGEM', 'PRODUTO.PRODUTO_NOME', 'PRODUTO.PRODUTO_PRECO', 'PRODUTO.PRODUTO_DESCONTO')
                        ->orderByDesc('TOTAL_VENDIDO');
                    break;
                case 'lancamentos':
                    $query->orderBy('PRODUTO_ID', 'desc');
                    break;
                case 'maiorPreco':
                    $query->orderByRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) DESC');
                    break;
                case 'menorPreco':
                    $query->orderByRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) ASC');
                    break;
                case 'aZ':
                    $query->orderBy('PRODUTO_NOME', 'asc');
                    break;
                case 'zA':
                    $query->orderBy('PRODUTO_NOME', 'desc');
                    break;
            }

            // Filtra por preço
            if ($minValueInput || $maxValueInput) {
                $query->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) >= ?', [$minValueInput])
                    ->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) <= ?', [$maxValueInput]);
            }

            // Verifica se $produtoLancamentos tem valor
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

            // Busca todas as categorias ativas
            $categorias = Categoria::where('CATEGORIA_ATIVO', 1)->get();

            // Busca o maior valor dos produtos
            $maxValue = Produto::max('PRODUTO_PRECO');

            // Conta o número de produtos diferentes no carrinho do usuário logado onde a quantidade do item é maior que 0
            $qtdItensCarinho = Carrinho::where('USUARIO_ID', $usuarioId)
                ->where('ITEM_QTD', '>', 0)
                ->distinct('PRODUTO_ID')
                ->count('PRODUTO_ID');

            // Conta quantos produtos foram achados na busca
            $qtdProdutos = $produtos->total();

            return view('produto.search', [
                'search' => $search,
                'categorias' => $categorias,
                'qtdProdutos' => $qtdProdutos,
                'produtos' => $produtos,
                'maxValue' => $maxValue,
                'categoria_id' => $categoria_id,
                'qtdItensCarinho' => $qtdItensCarinho
            ]);
        } else {
            // Exibe uma mensagem de erro
            return redirect()->back()->with('error', 'Nenhum termo de pesquisa foi inserido.');
        }
    }

    //metedo exibir
    public function show(Produto $produto)
    {
        // Produtos Mais Vendidos
        $produtoMaisVendidos = Produto::where('PRODUTO_ATIVO', 1)
            ->whereRaw('(PRODUTO_PRECO - PRODUTO_DESCONTO) > 0')->select(
                'PRODUTO.PRODUTO_ID',
                DB::raw('pi.PRIMEIRA_IMAGEM as PRIMEIRA_IMAGEM'),
                'PRODUTO.PRODUTO_NOME',
                DB::raw('SUM(PEDIDO_ITEM.ITEM_QTD) AS TOTAL_VENDIDO'),
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO'
            )
            ->leftJoin('PEDIDO_ITEM', 'PRODUTO.PRODUTO_ID', '=', 'PEDIDO_ITEM.PRODUTO_ID')
            ->leftJoin(DB::raw('(SELECT PRODUTO_ID, MIN(IMAGEM_ORDEM), MIN(IMAGEM_URL) as PRIMEIRA_IMAGEM FROM PRODUTO_IMAGEM GROUP BY PRODUTO_ID) AS pi'), 'PRODUTO.PRODUTO_ID', '=', 'pi.PRODUTO_ID')
            ->where('PEDIDO_ITEM.ITEM_QTD', '>', 0)
            ->groupBy('PRODUTO.PRODUTO_ID', 'pi.PRIMEIRA_IMAGEM', 'PRODUTO.PRODUTO_NOME', 'PRODUTO.PRODUTO_PRECO', 'PRODUTO.PRODUTO_DESCONTO')
            ->orderByDesc('TOTAL_VENDIDO')
            ->limit(12)
            ->get();

        //Usuário ativo
        $usuarioId = auth()->id();

        // Conta o número de produtos diferentes no carrinho do usuário logado onde a quantidade do item é maior que 0
        $qtdItensCarinho = Carrinho::where('USUARIO_ID', $usuarioId)
            ->where('ITEM_QTD', '>', 0)
            ->distinct('PRODUTO_ID')
            ->count('PRODUTO_ID');

        return view('produto.show', ['produto' => $produto, 'produtoMaisVendidos' => $produtoMaisVendidos, 'qtdItensCarinho' => $qtdItensCarinho]);
    }
}
