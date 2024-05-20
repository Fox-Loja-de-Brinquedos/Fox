<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;


class profileController extends Controller
{
    public function create(){
        $userId = Auth::id();
        $pedidos = Pedido::where('USUARIO_ID', $userId)->get();
        return view('perfil.profile', ['user' => $userId, 'pedidos' => $pedidos]);
}

    public function updateProfileName(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::find(auth()->id());
        $user->USUARIO_NOME = $request->name;
        $user->save();

        return redirect()->back()->with('nameSucess', 'Novo nome de perfil definido com sucesso!');
    }

    public function updateProfileEmail(Request $request){
        $request->validate([
            'new_email' => 'required|email|unique:USUARIO,USUARIO_EMAIL',
            'password' => 'required',
        ],[
            'new_email.email' => 'O e-mail fornecido é inválido.',
            'new_email.unique' => 'Este e-mail já está em uso por outro usuário.',
        ]);


        if (!Hash::check($request->password, auth()->user()->USUARIO_SENHA)) {
            return redirect()->back()->with('errorPassEmail', 'Senha atual incorreta.');
        }

        $user = User::find(auth()->id());
        $user->USUARIO_EMAIL = $request->new_email;
        $user->save();
    
        return redirect()->back()->with('successEmail', 'E-mail atualizado com sucesso!');
    }

    public function updateProfilePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
        ], [
            'new_password.min' => 'A nova senha deve ter pelo menos 8 caracteres.', 
        ]);

        if (!Hash::check($request->current_password, auth()->user()->USUARIO_SENHA)) {
            return redirect()->back()->with('currentPassError', 'Senha atual incorreta.');
        }

        $user = User::find(auth()->id());
        $user->USUARIO_SENHA = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('successPassword', 'Senha atualizada com sucesso!');
    }

    public function showAccountDetails(){
        return view("perfil.accountDetails");
    }
}
