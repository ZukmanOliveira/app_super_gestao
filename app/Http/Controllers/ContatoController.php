<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function contato2()
    {
        return view('site.contato');
    }
    

    public function contato(Request $request)
    {

        $contato  = new SiteContato();
        $contato -> nome = $request -> nome;
        $contato -> telefone = $request -> telefone;
        $contato -> email = $request-> email;
        $contato -> motivo_contato = $request->input('motivo_contato');
        $contato -> mensagem = $request->mensagem;

        dd($contato);
        $contato->save();

        return view('site.contato');
        
    }
}
