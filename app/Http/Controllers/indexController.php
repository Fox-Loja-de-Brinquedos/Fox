<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class indexController extends Controller
{
    public function index(){
        return view('index');
    }
}
