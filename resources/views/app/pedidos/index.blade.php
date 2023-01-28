@extends('layouts.basico')
@section('conteudo')

@include('layouts._partials.topo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-adicionar">
        <p>Pedidos-Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('pedido.create')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    
    <div class="informacao-pagina">
        <div style="width: 90$; margin-left: auto; margin-right: auto;"> 
            <table border="1" width="100%"  margin-left="auto">
                <thead>
                    <tr>
                        <th>Pedidos</th>
                        <th>Cliente</th>
                        <th>Produtos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido as $pedidos)
                        <tr>
                            <td>{{$pedidos->id}}</td>
                            <td>{{$pedidos->clientes_id}}</td>
                            <td><a href="{{route('pedido-produto.create', ['pedido' => $pedidos->id])}}">Adicionar Produtos</a></td>
                            <td><a href="">visualizar</a></td>
                            <td><a href="">Editar</a></td>
                            <td><a href="">Excluir</a></td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>

            {{$pedido->appends($request)->links()}}
            
            <!--Total de registro por páginas-->
            {{$pedido->count()}}
            <!--Tota de registro da consulta-->
            {{$pedido->total()}}
            <!--Número do primeiro registro da página-->
            {{$pedido->firstItem()}} 
            <!--Número do ultimo registro da pagina-->
            {{$pedido->lastItem()}}
            <div class="teste">
                  {{$pedido->links('shared.pagination')}}
            </div>
        </div>
    </div>  
</div>

@endsection