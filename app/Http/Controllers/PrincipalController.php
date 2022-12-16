<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use App\Models\LogAcesso;
use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function __construct()
    {
        $this->middleware(LogAcessoMiddleware::class);
    }
    public function principal(){

        $motivo_contatos = MotivoContato::all();
        
        return view('site.principal',['motivo_contatos' => $motivo_contatos]);
    }
}
