<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produtos;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $produtos = Item::paginate(10);

        return view('app.produtos.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produtos.create',['unidades' => $unidades, 'fornecedores'=> $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**Mensagem para validação */
        
       $regras = [
            'nome'=>'required|min:3|max:48',
            'descricao' => 'required|min:1|max:255',
            'peso' =>'required|min:1',
            'unidade_id' =>'exists:unidades,id',
       ];

       /**Menssagem para validação */
       $feedback = [
            'nome.required' =>'Precisar informar O nome',
            'nome.min' =>'Precisar informar 3 caracteres',
            'nome.max' =>'Precisar ser menor que 48 caracteres',
            'descricao.required' =>'Precisar informar 3 caracteres',
            'descricao.min' =>'Precisar informar 3 caracteres',
            'descricao.max' =>'Precisar ser menor que 48 caracteres',
            'peso.required' => 'Porfavor informae o peso',
            'peso.min' => 'Porfavor informe mínimo 4 caractéres',
            'unidade_id.required'=>'Porfavor informe a unidade'
       ];

      $request->validate($regras, $feedback);

        Produtos::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produto)
    {
        return view('app.produtos.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produtos.edit',['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Produtos $produto)
    {   
        $produto->update($request->all());
        

        return redirect()->route( 'produto.show', [ 'produto' => $produto->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produto)
    {   
        dd($produto);

        $produto->delete($produto->id);

        return redirect()->route('produto.index',['produto'=>$produto->id]);
    }
}
