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
    public function listarItens()
    {
        $usuario_id = auth()->id();
        $itens = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('ITEM_QTD', '>', 0)
            ->get();
    
        return view('pedidos.carrinho', compact('itens'));
    }

    public function adicionarItem(Request $request)
    {
        $request->validate([
            'PRODUTO_ID' => 'required|exists:PRODUTO,PRODUTO_ID',
        ]);
    
        $usuario_id = auth()->id();
        $produto_id = $request->PRODUTO_ID;
    
        $carrinhoItem = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('PRODUTO_ID', $produto_id)
            ->first();

        if ($carrinhoItem) {
            $carrinhoItem->ITEM_QTD += 1;
            $carrinhoItem->save();
        } else {
            $carrinhoItem = Carrinho::create([
                'USUARIO_ID' => $usuario_id,
                'PRODUTO_ID' => $produto_id,
                'ITEM_QTD' => 1
            ]);
        }
        return redirect()->route('carrinho.listar')->with('success', 'Item adicionado ao carrinho com sucesso.');
    }

    public function removerItem(Request $request)
    {
        $usuario_id = $request->input('USUARIO_ID');
        $produto_id = $request->input('PRODUTO_ID');

        $carrinhoItem = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('PRODUTO_ID', $produto_id)
            ->first();

        if ($carrinhoItem) {
            $carrinhoItem->ITEM_QTD = 0;
            $carrinhoItem->save();
        }

        return redirect()->route('carrinho.listar')->with('success', 'Item removido do carrinho com sucesso.');
    }

    public function atualizarItem(Request $request)
    {
        $usuario_id = $request->input('USUARIO_ID');
        $produto_id = $request->input('PRODUTO_ID');
        $nova_quantidade = $request->input('ITEM_QTD');

        if ($nova_quantidade < 1) {
            return redirect()->route('carrinho.listar')->with('error', 'A quantidade mínima é 1.');
        }

        $carrinhoItem = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('PRODUTO_ID', $produto_id)
            ->first();

        if ($carrinhoItem) {
            $carrinhoItem->ITEM_QTD = $nova_quantidade;
            $carrinhoItem->save();
        }

        return redirect()->route('carrinho.listar')->with('success', 'Quantidade de item atualizada com sucesso.');
    }

}
