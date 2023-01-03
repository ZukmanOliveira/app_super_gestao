@extends('layouts.basico')
@include('layouts._partials.topo')

    <div class="conteudo-pagina-adicionar">
        <div class="titulo-pagina">
            <p>Fornecedor-adicionar</p>
        </div>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informação-pagina">

        <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
            
            <form action="{{route('app.fornecedor.adicionar')}}" method="post">
                
                <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
                @csrf
                <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome"  class="borda-preta">
                 {{$errors->has('nome') ? $errors->first('name') : ""}}
                 
                <input type="text" name="site"  value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site"  class="borda-preta">
                {{$errors->has('site') ? $errors->first('site') : ""}}

                <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}"  placeholder="uf"    class="borda-preta"> 
                {{$errors->has('uf') ? $errors->first('uf') : ""}}

                <input type="text" name="email" value="{{ $fornecedor->email ?? old('email')}}"placeholder="Email" class="borda-preta">
                {{$errors->has('email') ? $errors->first('email') : ""}}
                
                <button type="submit" class="borda-preta">Adicionar</button>
           
            </form>
        </div>
    </div>  
</div>