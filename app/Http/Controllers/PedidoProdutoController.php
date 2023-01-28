<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProdutos;
use App\Models\Produtos;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produtos::all();
     
        return view('app.pedido-produto.create',['pedido' => $pedido, 'produtos'=> $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {       
       
        $regras = [
            'produtos_id' =>'exists:produtos,id',
        
        ];

        $feedback = [
            'produtos_id.exists' => 'Porfavor selecione um produto'
        ];

        $request->validate($regras, $feedback);
        /*
        $pedidoProdutos = new PedidoProdutos();
        $pedidoProdutos->pedidos_id = $pedido->id;
        $pedidoProdutos->produtos_id = $request->get('produtos_id');
        $pedidoProdutos->save();
        */
        
        $pedido->produtos()->attach(
            $request->get('produtos_id'),
            ['quantidade' => $request->get('quantidade')]
        );

        return redirect()->route('pedido-produto.create',['pedido' => $pedido]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
