<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;


class registerController extends Controller
{
    public function create(){
        return view("login.login");
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'USUARIO_NOME' => ['required', 'string', 'max:255'],
            'USUARIO_CPF' => ['required', 'string', 'max:255'],
            'USUARIO_EMAIL' => ['required', 'string', 'email', 'max:255', 'unique:USUARIO'],
            'USUARIO_SENHA' => ['required', Rules\Password::defaults()],
        ]);
        
        $user = User::create([
            'USUARIO_NOME' => $request->USUARIO_NOME,
            'USUARIO_CPF' => $request->USUARIO_CPF,
            'USUARIO_EMAIL' => $request->USUARIO_EMAIL,
            'USUARIO_SENHA' => Hash::make($request->USUARIO_SENHA),
        ]);
        

        Auth::login($user);

        return redirect(route('profile', absolute: false));
    }

}
