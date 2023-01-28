<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedido = Pedido::paginate(10);

        return view('app.pedidos.index',['pedido' => $pedido, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        return view('app.pedidos.create',[ 'clientes' => $clientes ]);
    }

  
    public function store(Request $request)
    {
        $regras = [
            'clientes_id' => 'exists:clientes,id'
        ];

        $feedback = [
            'clientes_id.exists'=> 'cliente informado não existe'
        ];

        $request->validate($regras, $feedback);

        $pedido = new Pedido();
        $pedido->clientes_id = $request->clientes_id;
        $pedido->save();

        return redirect()->route('pedido.index');   
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
