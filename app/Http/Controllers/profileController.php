<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index(){
        return view("perfil.profile");
    }

    public function showAddress(){
        return view("perfil.address");
    }

    public function showAccountDetails(){
        return view("perfil.accountDetails");
    }
}
