<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function create()
    {
        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato',['motivo_contatos' => $motivo_contatos]);
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' =>'required|min:1|max:50',
            'telefone'=>'required|min:1|max:15',
            'email'=>'required',
            'motivo_contatos_id'=>'required',
            'mensagem' =>'required',
        ],

        [
            'nome.required'=>'O campo nome deve ser preenchido',
            'telefone.required'=>'O campo telefone deve ser preenchido',
            'email.required'=>'O campo email deve ser preenchido',
            'motivo_contatos_id.required' =>'Por favor, informe o motivo',
            'mensagem.required' =>'Por favor, informe a mensagem'
        ]);

        

        SiteContato::create($request->all());
        return redirect()->route('site.index');
        
    }
}
