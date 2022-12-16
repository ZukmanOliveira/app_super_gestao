<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        $ip = $request->server->get('SERVER_NAME');
        
        $rota = $request->server->get('PHP_SELF');
        



        LogAcesso::create(["log"=> "IP $ip  yxz requisitou a rota $rota abcd"]);
        
        //return $next($request);
        $resposta = $next($request);

        return $resposta;
        
    
    }
}
