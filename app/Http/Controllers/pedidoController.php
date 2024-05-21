<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Carrinho;
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
            $user = Auth::user();

            //Quantidade de produtos
            $itemQtd = 1;

            // Verifica se já existe um registro para o usuário e produto no carrinho
            $existingCartItem = Carrinho::where('USUARIO_ID', $user->USUARIO_ID)
                ->where('PRODUTO_ID', $produto->PRODUTO_ID)
                ->first();

            // Se não houver registro, cria um novo
            if (!$existingCartItem) {
                Carrinho::create([
                    'USUARIO_ID' => $user->USUARIO_ID,
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

        return view('pedidos.carrinho', ['carrinhoItens' => $carrinhoItens]);
    }
}
