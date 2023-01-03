@extends('site.layouts.basico')
@section('title','Contato')
@section('conteudo')
@include('site.layouts._partials.topo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action="{{route('login.store')}}" method="post">
                    @csrf
                    <input name="login" type="text" value="{{old('login')}}" placeholder="Login" class="borda-preta">
                        {{$errors->has('login') ? $errors->first('login'):''}}
                    <input name="password" type="password" value="{{old('password')}}"placeholder="Password" class="borda-preta">
                        {{$errors->has('password') ? $errors->first('password'):''}}
                    <button type="submit" class="">Acessa</button>
                </form>

                {{isset($erro) && $erro != '' ? $erro :''}}
            </div>
        </div>
       
    </div>
    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src={{asset('img/facebook.png')}}>
            <img src={{asset('img/linkedin.png')}}>
            <img src={{asset('img/youtube.png')}}>
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src={{asset('img/mapa.png')}}>
        </div>
    </div>
@endsection