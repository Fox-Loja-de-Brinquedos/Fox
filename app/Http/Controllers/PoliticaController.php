<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
class PoliticaController extends Controller
{
    public function politicaDePrivacidade()
    {
        // Usuário ativo
        $usuarioId = auth()->id();

        // Conta o número de produtos diferentes no carrinho do usuário logado onde a quantidade do item é maior que 0
        $qtdItensCarinho = Carrinho::where('USUARIO_ID', $usuarioId)
            ->where('ITEM_QTD', '>', 0)
            ->distinct('PRODUTO_ID')
            ->count('PRODUTO_ID');

        return view('politicas.politica-de-privacidade', [
            'qtdItensCarinho' => $qtdItensCarinho
        ]);
    }

    public function sobreNos()
    {
        // Usuário ativo
        $usuarioId = auth()->id();

        // Conta o número de produtos diferentes no carrinho do usuário logado onde a quantidade do item é maior que 0
        $qtdItensCarinho = Carrinho::where('USUARIO_ID', $usuarioId)
            ->where('ITEM_QTD', '>', 0)
            ->distinct('PRODUTO_ID')
            ->count('PRODUTO_ID');

        return view('politicas.sobre-nos', [
            'qtdItensCarinho' => $qtdItensCarinho
        ]);
    }

    public function trocasDevolucoes()
    {
        // Usuário ativo
        $usuarioId = auth()->id();

        // Conta o número de produtos diferentes no carrinho do usuário logado onde a quantidade do item é maior que 0
        $qtdItensCarinho = Carrinho::where('USUARIO_ID', $usuarioId)
            ->where('ITEM_QTD', '>', 0)
            ->distinct('PRODUTO_ID')
            ->count('PRODUTO_ID');

        return view('politicas.trocas-devolucoes', [
            'qtdItensCarinho' => $qtdItensCarinho
        ]);
    }
}
