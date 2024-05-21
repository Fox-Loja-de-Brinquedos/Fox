<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Carrinho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class pedidoController extends Controller
{
    public function index(Produto $produto)
    {
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

        // Recupera todos os itens do carrinho do usuário com detalhes do produto
        $carrinhoItens = Carrinho::where('USUARIO_ID', $user->USUARIO_ID)
            ->join('PRODUTO', 'CARRINHO_ITEM.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
            ->leftJoin('PRODUTO_IMAGEM', 'PRODUTO.PRODUTO_ID', '=', 'PRODUTO_IMAGEM.PRODUTO_ID')
            ->select('PRODUTO.*', 'CARRINHO_ITEM.ITEM_QTD', 'PRODUTO_IMAGEM.IMAGEM_URL')
            ->get();

            //dd($carrinhoItens);

        return view('pedidos.carrinho', ['carrinhoItens' => $carrinhoItens]);
    }
}
