@extends('layouts.basico')
@section('conteudo')

@include('layouts._partials.topo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-adicionar">
        <p>Fornecedor-Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('produto.create')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    
    <div class="informacao-pagina">
        <div style="width: 90$; margin-left: auto; margin-right: auto;"> 
            <table border="1" width="100%"  margin-left="auto">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Detalhes</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->unidade_id}}</td>
                            <td><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                            <td><a href="">Excluir</a></td>
                            <td><a href="{{route('produto.edit',['produto' =>$produto->id])}}">Editar</td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>

            {{$produtos->appends($request)->links()}}
            
            <!--Total de registro por páginas-->

            {{$produtos->count()}}
            <!--Tota de registro da consulta-->
            {{$produtos->total()}}
            <!--Número do primeiro registro da página-->
            {{$produtos->firstItem()}} 
            <!--Número do ultimo registro da pagina-->
            {{$produtos->lastItem()}}
            <div class="teste">
                  {{$produtos->links('shared.pagination')}}
            </div>
        </div>
    </div>  
</div>

@endsection