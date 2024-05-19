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
}
