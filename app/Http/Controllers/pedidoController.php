<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Pedido_Item;
use App\Models\Endereco;
use Illuminate\Http\Request;


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

    public function checkout(){
        $usuario_id = auth()->id();
        $itens = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('ITEM_QTD', '>', 0)
            ->get();

            $endereco = Endereco::where('USUARIO_ID', $usuario_id)
            ->where('ENDERECO_APAGADO', 0)
            ->first();
            
            return view('pedidos.checkout', compact('itens', 'endereco'));
    }

    public function finalizarPedido(Request $request)
{

    // pegando os dados do formulário de endereco
    $usuario_id = auth()->id();
    $endereco_id = $request->input('ENDERECO_ID'); 
    $itens = Carrinho::where('USUARIO_ID', $usuario_id)
        ->where('ITEM_QTD', '>', 0)
        ->get();

    // Gerando um pedido
    $pedido = Pedido::create([
        'USUARIO_ID' => $usuario_id,
        'STATUS_ID' => 1,
        'PEDIDO_DATA' => now(),
        'ENDERECO_ID' => $endereco_id,
    ]);

    // Adicione os itens do carrinho como itens do pedido
    foreach ($itens as $item) {
        Pedido_Item::create([
            'PEDIDO_ID' => $pedido->PEDIDO_ID,
            'PRODUTO_ID' => $item->PRODUTO_ID,
            'ITEM_QTD' => $item->ITEM_QTD,
            'ITEM_PRECO' => $item->produto->PRODUTO_PRECO, 
        ]);
    }

    //Chamando funcao para limpar o carrinho apos todas etapas cumpridas
    $this->limparCarrinho();
    
    return view('pedidos.pedido-realizado');
}

public function limparCarrinho()
{
    $usuario_id = auth()->id();

    Carrinho::where('USUARIO_ID', $usuario_id)->update(['ITEM_QTD' => 0]);
}

}
