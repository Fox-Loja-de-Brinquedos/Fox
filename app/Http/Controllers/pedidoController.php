<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Pedido_Item;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class pedidoController extends Controller
{
    public function index()
    {
        // Pega o usuário logado
        $user = Auth::user();

        // Consulta os itens do carrinho
        $carrinhoItens = DB::table('CARRINHO_ITEM')
            ->where('CARRINHO_ITEM.USUARIO_ID', $user->USUARIO_ID)
            ->join('PRODUTO', 'CARRINHO_ITEM.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
            ->leftJoin(DB::raw('(SELECT PRODUTO_ID, MIN(IMAGEM_URL) AS IMAGEM_URL FROM PRODUTO_IMAGEM GROUP BY PRODUTO_ID) AS IMAGENS'), function ($join) {
                $join->on('PRODUTO.PRODUTO_ID', '=', 'IMAGENS.PRODUTO_ID');
            })
            ->select(
                'PRODUTO.PRODUTO_ID',
                'PRODUTO.PRODUTO_NOME',
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO',
                DB::raw('SUM(CARRINHO_ITEM.ITEM_QTD) AS ITEM_QTD'),
                'IMAGENS.IMAGEM_URL'
            )
            ->groupBy(
                'PRODUTO.PRODUTO_ID',
                'PRODUTO.PRODUTO_NOME',
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO',
                'IMAGENS.IMAGEM_URL'
            )
            ->get();

        return view('pedidos.carrinho', ["carrinhoItens" => $carrinhoItens]);
    }

    public function store(Produto $produto)
    {
        if ($produto) {
            // Pega o usuário logado
            $user = Auth::user()->USUARIO_ID;

            //Quantidade de produtos
            $itemQtd = 1;

            // Verifica se já existe um registro para o usuário e produto no carrinho
            $existingCartItem = Carrinho::where('USUARIO_ID', $user)
                ->where('PRODUTO_ID', $produto->PRODUTO_ID)
                ->first();

            // Se não houver registro, cria um novo
            if (!$existingCartItem) {
                Carrinho::create([
                    'USUARIO_ID' => $user,
                    'PRODUTO_ID' => $produto->PRODUTO_ID,
                    'ITEM_QTD' => $itemQtd,
                ]);
            } else {
                /*$existingCartItem->update([
                'ITEM_QTD' => $existingCartItem->ITEM_QTD + $itemQtd,
            ]);*/
            }
        }

        // Consulta os itens do carrinho
        $carrinhoItens = DB::table('CARRINHO_ITEM')
            ->where('CARRINHO_ITEM.USUARIO_ID', $user)
            ->join('PRODUTO', 'CARRINHO_ITEM.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
            ->leftJoin(DB::raw('(SELECT PRODUTO_ID, MIN(IMAGEM_URL) AS IMAGEM_URL FROM PRODUTO_IMAGEM GROUP BY PRODUTO_ID) AS IMAGENS'), function ($join) {
                $join->on('PRODUTO.PRODUTO_ID', '=', 'IMAGENS.PRODUTO_ID');
            })
            ->select(
                'PRODUTO.PRODUTO_ID',
                'PRODUTO.PRODUTO_NOME',
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO',
                DB::raw('SUM(CARRINHO_ITEM.ITEM_QTD) AS ITEM_QTD'),
                'IMAGENS.IMAGEM_URL'
            )
            ->groupBy(
                'PRODUTO.PRODUTO_ID',
                'PRODUTO.PRODUTO_NOME',
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO',
                'IMAGENS.IMAGEM_URL'
            )
            ->get();

        return view('pedidos.carrinho', ['carrinhoItens' => $carrinhoItens]);
    }

    public function checkout()
    {
        $user = Auth::user()->USUARIO_ID;

        // Consulta os itens do carrinho
        $carrinhoItens = DB::table('CARRINHO_ITEM')
            ->where('CARRINHO_ITEM.USUARIO_ID', $user)
            ->join('PRODUTO', 'CARRINHO_ITEM.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
            ->leftJoin(DB::raw('(SELECT PRODUTO_ID, MIN(IMAGEM_URL) AS IMAGEM_URL FROM PRODUTO_IMAGEM GROUP BY PRODUTO_ID) AS IMAGENS'), function ($join) {
                $join->on('PRODUTO.PRODUTO_ID', '=', 'IMAGENS.PRODUTO_ID');
            })
            ->select(
                'PRODUTO.PRODUTO_ID',
                'PRODUTO.PRODUTO_NOME',
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO',
                DB::raw('SUM(CARRINHO_ITEM.ITEM_QTD) AS ITEM_QTD'),
                'IMAGENS.IMAGEM_URL'
            )
            ->groupBy(
                'PRODUTO.PRODUTO_ID',
                'PRODUTO.PRODUTO_NOME',
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO',
                'IMAGENS.IMAGEM_URL'
            )
            ->get();


        return view('pedidos.checkout', ['carrinhoItens' => $carrinhoItens]);
    }

    public function finish()
    {
        $user = Auth::user()->USUARIO_ID;
        $statusID = 1;
        $currentDate = today()->format('Y-m-d');
        $idDoEndereco = Endereco::where('USUARIO_ID', $user)->value('ENDERECO_ID');

        // Verifica se já existe um pedido com os mesmos valores
        $existingPedido = Pedido::where([
            'USUARIO_ID' => $user,
            'STATUS_ID' => $statusID,
            'PEDIDO_DATA' => $currentDate,
            'ENDERECO_ID' => $idDoEndereco
        ])->first();

        // Se não existir, cria um novo pedido
        if (!$existingPedido) {
            Pedido::create([
                'USUARIO_ID' => $user,
                'STATUS_ID' => $statusID,
                'PEDIDO_DATA' => $currentDate,
                'ENDERECO_ID' => $idDoEndereco
            ]);
            // Remove os itens do carrinho do usuário
            Carrinho::where('USUARIO_ID', $user)->delete();
        }
    }

    public function storePedidoItem()
    {
        // Obtém o ID do usuário autenticado
        $user = Auth::user()->USUARIO_ID;

        // Obtém o ID do pedido mais recente do usuário
        $pedidoId = Pedido::where('USUARIO_ID', $user)->orderBy('PEDIDO_ID', 'desc')->value('PEDIDO_ID');

        // Consulta os IDs dos produtos no carrinho, as quantidades, os preços e os descontos
        $produtosEQuantidades = DB::table('CARRINHO_ITEM')
            ->where('CARRINHO_ITEM.USUARIO_ID', $user)
            ->join('PRODUTO', 'CARRINHO_ITEM.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
            ->select(
                'CARRINHO_ITEM.PRODUTO_ID',
                DB::raw('SUM(CARRINHO_ITEM.ITEM_QTD) as ITEM_QTD'),
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO'
            )
            ->groupBy('CARRINHO_ITEM.PRODUTO_ID', 'PRODUTO.PRODUTO_PRECO', 'PRODUTO.PRODUTO_DESCONTO')
            ->get();

        // Itera sobre cada produto e quantidade
        foreach ($produtosEQuantidades as $produtoItem) {
            // Verifica se o item do pedido já existe
            $existingPedidoItem = Pedido_Item::where('PEDIDO_ID', $pedidoId)
                ->where('PRODUTO_ID', $produtoItem->PRODUTO_ID)
                ->first();

            if (!$existingPedidoItem) {
                // Calcula o preço total do item considerando o desconto
                $itemPreco = ($produtoItem->PRODUTO_PRECO - $produtoItem->PRODUTO_DESCONTO) * $produtoItem->ITEM_QTD;

                // Cria o item do pedido
                Pedido_Item::create([
                    'PRODUTO_ID' => $produtoItem->PRODUTO_ID,
                    'PEDIDO_ID' => $pedidoId,
                    'ITEM_QTD' => $produtoItem->ITEM_QTD,
                    'ITEM_PRECO' => $itemPreco
                ]);
            }
        }
        
        return view('pedidos.pedido-realizado');
    }
}
