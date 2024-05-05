<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('login.login');
    }


    public function store(Request $request)
    {
        // Extrair email e senha do request
        $credentials = $request->only('USUARIO_EMAIL', 'USUARIO_SENHA');

        // Verificar se existe um usuário com o email fornecido
        $user = User::where('USUARIO_EMAIL', $credentials['USUARIO_EMAIL'])->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Credenciais inválidas. Por favor, tente novamente.');
        }

        // Verificar se a senha fornecida corresponde à senha do usuário
        if (password_verify($credentials['USUARIO_SENHA'], $user->USUARIO_SENHA)) {
            // Autenticar o usuário manualmente
            Auth::login($user);

            // Redirecionar para a página de perfil
            return redirect()->intended(route('profile'));
        }

        // Senha incorreta
        return redirect()->route('login')->with('error', 'Credenciais inválidas. Por favor, tente novamente.');
    }


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
