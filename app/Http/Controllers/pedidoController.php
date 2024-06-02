<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Pedido_Item;
use App\Models\Endereco;
use App\Models\Produto_Estoque;
use Illuminate\Http\Request;
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
        // Verificar se o usuário está autenticado
        if (!auth()->check()) {
            // Se não estiver autenticado, retornar um código de status 401 (Não Autorizado)
            return response()->json([], 401)
                ->header('Location', route('login')); // Redirecionar para a página de login
        }

        $request->validate([
            'PRODUTO_ID' => 'required|exists:PRODUTO,PRODUTO_ID',
            'ITEM_QTD' => 'required|integer|min:1',
        ]);

        $usuario_id = auth()->id();
        $produto_id = $request->PRODUTO_ID;
        $item_qtd = $request->ITEM_QTD;

        $carrinhoItem = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('PRODUTO_ID', $produto_id)
            ->first();

        if ($carrinhoItem) {
            $carrinhoItem->ITEM_QTD += $item_qtd;
            $carrinhoItem->save();
        } else {
            $carrinhoItem = Carrinho::create([
                'USUARIO_ID' => $usuario_id,
                'PRODUTO_ID' => $produto_id,
                'ITEM_QTD' => $item_qtd
            ]);
        }

        //retornando a resposta do servidor em JSON para utilizar requisição AJAX
        if ($request->ajax()) {
            return response()->json(['success' => 'Item adicionado ao carrinho com sucesso.']);
        }

    }

    public function removerItem(Request $request)
    {
        $usuario_id = $request->input('USUARIO_ID');
        $produto_id = $request->input('PRODUTO_ID');

        $carrinhoItem = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('PRODUTO_ID', $produto_id)
            ->first();

            if ($carrinhoItem) {
                $carrinhoItem->update(['ITEM_QTD' => 0]);
            }

            // Calcular novo subtotal e total
            $itens = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('ITEM_QTD', '>', 0)
            ->get();

            $subtotal = $itens->sum(function($item) {
                return ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD;
            });

            $frete = 10.00;
            $total = $subtotal + $frete;

            // Retornar a resposta com os novos valores
            return response()->json([
                'success' => true,
                'message' => 'Item removido do carrinho com sucesso.',
                'produto_id' => $produto_id,
                'subtotal' => $subtotal,
                'total' => $total,
                'subtotal_formatado' => number_format($subtotal, 2, ',', '.'),
                'total_formatado' => number_format($total, 2, ',', '.')
            ]);
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

    public function checkout()
    {
        $usuario_id = auth()->id();
        $itens = Carrinho::where('USUARIO_ID', $usuario_id)
            ->where('ITEM_QTD', '>', 0)
            ->get();

        if ($itens->isEmpty()) {
            return redirect()->back()->with('error', 'Adicione itens ao carrinho antes de prosseguir para o checkout.');
        }

        $endereco = Endereco::where('USUARIO_ID', $usuario_id)
            ->where('ENDERECO_APAGADO', 0)
            ->first();

        return view('pedidos.checkout', compact('itens', 'endereco'));
    }

    public function finalizarPedido(Request $request) {
            //Todas as operações de banco de dados a seguir são incluídas nesta transação
            DB::beginTransaction();
            try {
                // Pegando os dados do formulário de endereco
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

                // Adiciona os itens do carrinho como itens do pedido e atualiza o estoque
                foreach ($itens as $item) {
                    // Atualiza o estoque do produto
                    $produtoEstoque = Produto_Estoque::where('PRODUTO_ID', $item->PRODUTO_ID)->first();
                    if ($produtoEstoque) {
                        if ($produtoEstoque->PRODUTO_QTD < $item->ITEM_QTD) {
                            // Lança exceção se o estoque for insuficiente
                            throw new \Exception('Estoque insuficiente para o produto: ' . $item->produto->PRODUTO_NOME);
                        }

                        $produtoEstoque->PRODUTO_QTD -= $item->ITEM_QTD;
                        $produtoEstoque->save();
                    }

                    // Adiciona o item ao pedido
                    Pedido_Item::create([
                        'PEDIDO_ID' => $pedido->PEDIDO_ID,
                        'PRODUTO_ID' => $item->PRODUTO_ID,
                        'ITEM_QTD' => $item->ITEM_QTD,
                        'ITEM_PRECO' => $item->produto->PRODUTO_PRECO,
                    ]);
                }

                // Chamando funcao para limpar o carrinho apos todas etapas cumpridas
                $this->limparCarrinho();

                // Se todas as operações forem concluídas sem erros a transação é confirmada e todas as mudanças são aplicadas ao banco
                DB::commit();

                return view('pedidos.pedido-realizado');
            } catch (\Exception $e) {

                // Se qualquer operação dentro da transação falhar todas as mudanças feitas são revertidas
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

    public function limparCarrinho()
    {
        $usuario_id = auth()->id();

        Carrinho::where('USUARIO_ID', $usuario_id)->update(['ITEM_QTD' => 0]);
    }
}
