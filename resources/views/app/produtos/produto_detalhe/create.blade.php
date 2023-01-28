@extends('layouts.basico')
@include('layouts._partials.topo')

    <div class="conteudo-pagina-adicionar">
        <div class="titulo-pagina">
            <p>Adicionar Detalhes do Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('produto.index')}}">Voltar</a></li>
        </ul>
    </div>

    <div class="informação-pagina">

        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            @component('app.produtos.produto_detalhe._components.form_create_edit', ['unidades'=>$unidades])
                
            @endcomponent
        </div>
    </div>  
</div>

