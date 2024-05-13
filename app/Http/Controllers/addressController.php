<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;

class addressController extends Controller
{
    public function showAddress(){

    // $endereco = Auth::user()->endereco;

    // return view('perfil.address', compact('endereco'));

    $userId = auth()->id();
    
    $endereco = Endereco::where('USUARIO_ID', $userId)
                        ->where('ENDERECO_APAGADO', 0)
                        ->first();

    return view('perfil.address', compact('endereco'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'ENDERECO_NOME' => 'required|string|max:255',
            'ENDERECO_LOGRADOURO' => 'required|string|max:255',
            'ENDERECO_NUMERO' => 'required|string|max:10',
            'ENDERECO_CIDADE' => 'required|string|max:255',
            'ENDERECO_ESTADO' => 'required|string|max:255',
            'ENDERECO_CEP' => 'required|string|max:9',
            'ENDERECO_COMPLEMENTO' => 'nullable|string|max:255',
        ]);

        $userId = auth()->id();

        //retirei mascara do cep
        function cleanCEP($cep) {
            $cep = str_replace([' ', '-'], '', $cep);
            return $cep;
        }
        $cep = cleanCEP($request->input('ENDERECO_CEP'));
        
        $endereco = new Endereco([
            'USUARIO_ID' => $userId,
            'ENDERECO_NOME' => $request->input('ENDERECO_NOME'),
            'ENDERECO_LOGRADOURO' => $request->input('ENDERECO_LOGRADOURO'),
            'ENDERECO_NUMERO' => $request->input('ENDERECO_NUMERO'),
            'ENDERECO_CIDADE' => $request->input('ENDERECO_CIDADE'),
            'ENDERECO_ESTADO' => $request->input('ENDERECO_ESTADO'),
            'ENDERECO_CEP' => $cep,
            'ENDERECO_COMPLEMENTO' => $request->input('ENDERECO_COMPLEMENTO'),
        ]);

        $endereco->save();

        return redirect()->route('address')->with('success', 'Endereço adicionado com sucesso!');
    }

    public function update(Request $request, Endereco $endereco)
    {
        //retirei mascara do cep
        $request->merge([
            'ENDERECO_CEP' => str_replace('-', '', $request->ENDERECO_CEP),
        ]);

        $request->validate([
            'ENDERECO_NOME' => 'required|string|max:255',
            'ENDERECO_LOGRADOURO' => 'required|string|max:255',
            'ENDERECO_NUMERO' => 'required|string|max:10',
            'ENDERECO_CIDADE' => 'required|string|max:255',
            'ENDERECO_ESTADO' => 'required|string|max:255',
            'ENDERECO_CEP' => 'required|string|max:8', 
            'ENDERECO_COMPLEMENTO' => 'nullable|string|max:255',
        ]);
        
        $endereco->update($request->all());
    
        return redirect()->route('address')->with('success', 'Endereço atualizado com sucesso!');
    }

    public function removeAddress(Request $request)
{
    $userId = auth()->id();
    $endereco = Endereco::where('USUARIO_ID', $userId)
                        ->where('ENDERECO_APAGADO', 0)
                        ->first();
    
    if ($endereco) {
        $endereco->update(['ENDERECO_APAGADO' => 1]);
    }

    return redirect()->route('address')->with('success', 'Endereço removido com sucesso!');
}


}
