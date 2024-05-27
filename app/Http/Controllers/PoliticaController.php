<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PoliticaController extends Controller
{
    public function politicaDePrivacidade()
    {
        return view('politicas.politica-de-privacidade');
    }

    public function sobreNos()
    {
        return view('politicas.sobre-nos');
    }

    public function trocasDevolucoes()
    {
        return view('politicas.trocas-devolucoes');
    }
}
