@extends('layouts.basico')
@section('conteudo')

@include('layouts._partials.topo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-adicionar">
        <p>Fornecedor-Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('cliente.create')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    
    <div class="informacao-pagina">
        <div style="width: 90$; margin-left: auto; margin-right: auto;"> 
            <table border="1" width="100%"  margin-left="auto">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nome}}</td>

                            <td><a href="">visualizar</a></td>
                            <td><a href="">Editar</a></td>
                            <td><a href="">Excluir</a></td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>

            {{$clientes->appends($request)->links()}}
            
            <!--Total de registro por páginas-->

            {{$clientes->count()}}
            <!--Tota de registro da consulta-->
            {{$clientes->total()}}
            <!--Número do primeiro registro da página-->
            {{$clientes->firstItem()}} 
            <!--Número do ultimo registro da pagina-->
            {{$clientes->lastItem()}}
            <div class="teste">
                  {{$clientes->links('shared.pagination')}}
            </div>
        </div>
    </div>  
</div>

@endsection