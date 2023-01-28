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
                        <th>comprimento</th>
                        <th>altura</th>
                        <th>largura</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->fornecedor->nome}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->unidade_id}}</td>

                            <!--Utilizando os atributos de produtoDetalhes atravez do relacionamento ORM-->
                            <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>
                            <td>{{$produto->itemDetalhe->altura ?? '' }}</td>
                            <td>{{$produto->itemDetalhe->largura ?? '' }}</td>
                            
                            <td><a href="{{route('produto.show',['produto' => $produto->id])}}">Visualizar</a></td>

                            <!--Deletar produtos, Utilizando metodo resource em rotas-->
                            <form method="POST" action="{{route('produto.destroy', ['produto' => $produto])}}"  >
                                @method('delete')
                                <td><a href="{{route('produto.destroy',$produto->id)}}">Excluir</a></td>
                            </form>

                            <td><a href="{{route('produto.edit',['produto' =>$produto->id])}}">Editar</td>
                        </tr>

                        <tr>
                            <td colspan="12">
                                <p>Pedidos</p>
                                @foreach($produto->pedidos as $pedido   )
                                    <a href="{{route('pedido-produto.create',[ 'pedido' => $pedido ])}}">
                                        Pedido: {{$pedido->id}}
                                    </a>
                                @endforeach
                            </td>
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