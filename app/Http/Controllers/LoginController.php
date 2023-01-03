<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(Request $request){
    $erro ='';

        if($request->get('erro' == 1)){
    
            $erro = 'Usuario e  senha não existe';
        };

        if($request->get('erro' == 2)){
    
            $erro = 'Usuario precisar realizar login';
        };

        return view('site.login',['titulo'=>'login', 'erro' => $erro]);

    }
    public function store(Request $request){

        $regras = [
            'login' => 'email',
            'password' => 'required'
        ];

        $feedback = [
            'login.email' => 'login é obrigatório',
            'password.required'=>'A senha está incorreta'
        ];
        
        $request->validate($regras,$feedback);
        /**Recuperando parametros do formulário*/
        
        $email = $request->get('login');
        
        $password = $request->get('password');
        
        //echo "Login: $email | Senha: $password";
        

        /**Iniciando o Model User */

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        
        if(isset($usuario->name)){
            
            session_start();
            $_SESSION['login'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            
            return redirect()->route('app.home');
            
        }else{
            return redirect()->route('login.create',['erro' => 1]);
        }
    }
    public function sair( )
    {
        session_destroy();
        return redirect()->route('site.index');            
    }
    
}
