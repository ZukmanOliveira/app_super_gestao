@extends('layouts.basico')
@include('layouts._partials.topo')

    <div class="conteudo-pagina-adicionar">
        <div class="titulo-pagina">
            @if(isset($produto->id))
            <p>Editar Produto</p>
            @else
            <p>cadastrar Produto</p>
            @endif
        </div>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('produto.index')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informação-pagina">

        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            @component('app.produtos._components.form_create_edit',['unidades' => $unidades, 'fornecedores' => $fornecedores])
                
            @endcomponent
        </div>
    </div>  
</div>