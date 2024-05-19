<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;


class orderController extends Controller
{
    public function index(){
        $userId = Auth::id();
        
        $pedidos = Pedido::where('USUARIO_ID', $userId)->get();

        // Calcula a soma das unidades para cada pedido
        foreach ($pedidos as $pedido) {
            $pedido->totalUnidades = $pedido->itens->sum('ITEM_QTD');
        }

        // Calcula a soma dos preços para cada pedido
        foreach ($pedidos as $pedido) {
            $pedido->totalPreco = $pedido->itens->sum('ITEM_PRECO');
        }

        return view("perfil.orderList", compact('pedidos'));
    }

    public function show($id){
        $pedido = Pedido::with(['itens.produto.imagens', 'status'])->find($id);

        //função para somar todos os itens do pedido
        $pedido->totalPrecoBruto = $pedido->itens->sum(function ($item) {
            return $item->ITEM_PRECO * $item->ITEM_QTD;
        });

        $pedido->totalDesconto = 0;

        // Calcule o desconto total do pedido somando os descontos dos produtos em reais
        foreach ($pedido->itens as $item) {
            if ($item->produto) {
                $descontoEmReais = ($item->ITEM_PRECO * ($item->produto->PRODUTO_DESCONTO / 100)) * $item->ITEM_QTD;
                $item->descontoEmReais = $descontoEmReais;
                $pedido->totalDesconto += $descontoEmReais;
            } else {
                $item->descontoEmReais = 0;
            }
        }

        // Calcule o preço total do pedido após os descontos
        $pedido->totalPrecoComDesconto = $pedido->totalPrecoBruto - $pedido->totalDesconto;

        //trazendo dados do usuario autenticado
        $user = Auth::user();
        
        //trazendo endereço cadastrado no usuario, pois banco esta configurado errado
        $endereco = $user->endereco;

        return view('perfil.orderDetail', compact('pedido', 'endereco', 'user'));
    }
}
