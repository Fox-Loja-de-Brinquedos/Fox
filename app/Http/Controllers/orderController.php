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

        return view("perfil.orderList", compact('pedidos'));
    }
}
