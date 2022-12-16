<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(Request $request){
        $erro = '';

        if($request->get('erro' == 1)){
    
            $erro = 'Usuario e  senha não existe';
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
        /**Recuperando parametros do formlário*/

        $email = $request->get('login');
        
        $password = $request->get('password');
        
        //echo "Login: $email | Senha: $password";
        

        /**Iniciando o Model User */

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        
        if(isset($usuario)){
            $status = $usuario->first(['email','password']);
            dd($status);
            return $usuario;
        }else{
            return redirect()->route('site.login',['erro' => 1]);
        }
    }
    
}
