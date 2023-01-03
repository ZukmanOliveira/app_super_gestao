@extends('layouts.basico')
@section('conteudo')

@include('layouts._partials.topo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-adicionar">
        <p>Fornecedor-Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>
    
    <div class="informacao-pagina">
        <div style="width: 90$; margin-left: auto; margin-right: auto;"> 
            <table border="1" width="100%"  margin-left="auto">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{$fornecedor->nome}}</td>
                            <td>{{$fornecedor->site}}</td>
                            <td>{{$fornecedor->email}}</td>
                            <td>{{$fornecedor->uf}}</td>

                            <td><a href="{{route('app.fornecedor.delete', $fornecedor->id)}}">Excluir</a></td>
                        
                            <td><a href="{{route('app.fornecedor.editar', $fornecedor->id) }}">Editar</td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>
            <div class="teste">
                  {{$fornecedores->links('shared.pagination')}}
            </div>
        </div>
    </div>  
</div>

@endsection