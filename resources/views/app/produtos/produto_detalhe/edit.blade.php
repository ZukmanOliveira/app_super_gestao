@extends('layouts.basico')
@include('layouts._partials.topo')

    <div class="conteudo-pagina-adicionar">
        <div class="titulo-pagina">
            <p>Adicinar Produto</p>
        </div>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('produto.index')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informação-pagina">
        
        <h4>produtos</h4>
        <br>
            <div>Nome: {{$produto_detalhe->item->nome ?? '' }}</div>
        <br>
        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            @component('app.produtos.produto_detalhe._components.form_create_edit',['produto_detalhe'=> $produto_detalhe, 'unidades' => $unidades])

            @endcomponent   
        </div>
    </div>  
</div>