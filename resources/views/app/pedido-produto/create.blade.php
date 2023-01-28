@extends('layouts.basico')
@include('layouts._partials.topo')

    <div class="conteudo-pagina-adicionar">
        <div class="titulo-pagina">
        </div>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('pedido.index')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informação-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            <!--Utilizando "component para importar o formulario que está em outro diretorio"-->
            <h4>Detalhe do pedido</h4>
            <p>ID do pedido:{{$pedido->id}}</p>
            <p>Cliente:{{$pedido->clientes_id}}</p>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Do Produto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido->produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>
                            <form id="form_{{$pedido->id}}_{{$produto->id}}" method="post" action="{{route('pedido-produto.destroy',['pedido'=>$pedido->id, 'produto'=>$produto->id])}}">
                                @method('DELETE')
                                <a href="#" onclick="document.getElementeByID('form_{{$pedido->id}}_{{$produto->id}}').submit('')">Excluir</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Itens do pedido</h4>
            @component('app.pedido-produto._components.form_create',['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div> 
</div>