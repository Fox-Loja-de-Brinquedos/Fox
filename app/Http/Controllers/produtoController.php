<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
class produtoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('produto.index')->with('produtos', $produtos);
    }
}