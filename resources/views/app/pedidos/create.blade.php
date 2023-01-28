@extends('layouts.basico')
@include('layouts._partials.topo')

    <div class="conteudo-pagina-adicionar">
        <div class="titulo-pagina">
            @if(isset($pedido->id))
            <p>Editar Produto</p>
            @else
            <p>cadastrar Produto</p>
            @endif
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
            @component('app.pedidos._components.form_create_edit',['clientes' =>$clientes])
            @endcomponent
        </div>
    </div> 
</div>