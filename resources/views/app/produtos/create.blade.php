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
            
            <form action="{{route('produto.store')}}" method="post">
                @csrf
                <input type="text" name="nome" value="{{old('nome')}}" placeholder="Nome"  class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome'):'' }}
                  
                <input type="text" name="descrição"  value="{{old('descricao')}}" placeholder="Descrição"  class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao'):'' }}

                <input type="text" name="peso" value="{{old('peso')}}"  placeholder="Peso"    class="borda-preta"> 
                    {{ $errors->has('peso') ? $errors->first('peso'):'' }}

                <select name="unidade_id" >
                    <option>--- Selecione  a  Unidade de Medida</option>

                    @foreach ($unidades as $unidade)
                        <option value="{{$unidade->id}}">Unidade</option>
                    @endforeach
                </select>
                {{$errors->has('unidade_id') ? $errors->firs('unidade_id')}}
                <button type="submit" class="borda-preta">Adicionar</button>
            </form>
        </div>
    </div>  
</div>