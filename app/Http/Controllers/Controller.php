<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function __construct()
    {
        $this -> middleware(LogAcessoMiddleware::class);
        $this -> middleware(AutenticacaoMiddleware::class);
    }
    public function cliente(){
        return "Middleware testado com sucesso";
    }
    public function fornecedores(){
        return view('site.sobre-nos');
    }
}

