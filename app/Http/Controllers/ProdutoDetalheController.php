<?php

namespace App\Http\Controllers;

use App\Models\ItemDetalhe;
use App\Models\ProdutoDetalhe;
use App\Models\Produtos;
use App\Models\Unidade;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtoDetalhe = ProdutoDetalhe::all();

        return (['app.produtos.index,',['produtoDetalhe'=>$produtoDetalhe]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $unidades = Unidade::all();
     
        return view('app.produtos.produto_detalhe.create',['unidades'=> $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        
        //return redirect()->route('app.produtos.produto_detalhe.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoDetalhe = ItemDetalhe::find($id);

        $unidades = Unidade::all();

        return view('app.produtos.produto_detalhe.edit',['produto_detalhe'=> $produtoDetalhe, 'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        echo'Alteração realizada com secesso';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
