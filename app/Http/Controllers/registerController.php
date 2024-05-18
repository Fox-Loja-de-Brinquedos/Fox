<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;


class RegisterController extends Controller
{
    public function create(){
        return view("login.login");
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'USUARIO_NOME' => ['required', 'string', 'max:255'],
            'USUARIO_CPF' => ['required', 'string', 'max:255'],
            'USUARIO_EMAIL' => ['required', 'string', 'email', 'max:255', 'unique:USUARIO'],
            'USUARIO_SENHA' => ['required', Rules\Password::defaults()],
        ], [
            'USUARIO_NOME.required' => 'O campo Nome é obrigatório.',
            'USUARIO_CPF.required' => 'O campo CPF é obrigatório.',
            'USUARIO_EMAIL.required' => 'O campo E-mail é obrigatório.',
            'USUARIO_EMAIL.email' => 'Por favor, insira um endereço de e-mail válido.',
            'USUARIO_EMAIL.unique' => 'O e-mail fornecido já está em uso.',
            'USUARIO_SENHA.required' => 'O campo Senha é obrigatório.',
            'USUARIO_SENHA.min' => 'A senha deve ter pelo menos 8 caracteres.'
        ]);

        try {
            $user = User::create([
                'USUARIO_NOME' => $validatedData['USUARIO_NOME'],
                'USUARIO_CPF' => $validatedData['USUARIO_CPF'],
                'USUARIO_EMAIL' => $validatedData['USUARIO_EMAIL'],
                'USUARIO_SENHA' => Hash::make($validatedData['USUARIO_SENHA']),
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) { 
                return redirect()->back()->withErrors(['USUARIO_EMAIL' => 'O e-mail fornecido já está em uso.']);
            }
            // Você pode adicionar outros tratamentos de erro aqui conforme necessário
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao processar sua solicitação.']);
        }
    
        Auth::login($user);
    
        return redirect(route('profile', absolute: false));
    }
}