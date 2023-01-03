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
        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>{{ $produto->id }}</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td>{{ $produto->nome }}</td>
                </tr>
                <tr>
                    <td>Peso</td>
                    <td>{{ $produto->peso }}</td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td>{{ $produto->descricao }}</td>
                </tr>
                <tr>
                    <td>Unidade</td>
                    <td>{{ $produto->unidade_id }}</td>
                </tr>
            </table> 
        </div>
    </div>  
</div>