<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
                                ->where('site', 'like', '%'.$request->input('site').'%')
                                ->where('uf', 'like', '%'.$request->input('uf').'%')
                                ->where('email', 'like', '%'.$request->input('email').'%')
                                ->paginate(2);
        
        return view('app.fornecedor.lista',['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        /**Inclusao */
        if($request->input('_token') != '' && $request->input('id') == '')
        {
            /**Validação */
            $regras = [
                'nome' => 'required | min:5 | max:100',
                'site'  => 'required',
                'uf'  => 'required | min:2 | max:2',
                'email'  => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo deve ter no minimo 5 caracteres',
                'nome.max' => 'O campo deve ter no maximo 100 caracteres',
                'uf.min' => 'O campo deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo deve ter no maximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];
        
            
            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());
        }
        /**Edição */
        if($request->input('_token') != '' && $request->input('id') != '')
        {
            $fornecedor = Fornecedor::find($request->Input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                echo"Update Sucess";
            }else{
                echo"Update Fail";
            }
        }

        return view('app.fornecedor.adiciona');
        
    }

    
    public function editar($id)
    {   
        
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adiciona',['fornecedor'=>$fornecedor]);
    }

    public function destroy($id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
