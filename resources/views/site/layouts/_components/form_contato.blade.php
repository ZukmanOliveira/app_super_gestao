{{$slot}}
<form action="{{route('site.create')}}" method="post">
 @csrf    
 <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
 @if($errors->has('nome'))
    {{$errors->first('nome')}}
 @endif
 <br>
 <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    @if($errors->has('telefone'))
        {{$errors->first('telefone')}}
    @endif
 <br>
 <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
    @if($errors->has('email'))
        {{$errors->first('email')}}
    @endif
 <br>
<select name="motivo_contatos_id" class="{{ $classe }}">
    
    <option>Qual o motivo do contato?</option>    

    @foreach($motivo_contatos as $key => $motivo_contato)
    
        <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' :''}}>{{$motivo_contato ->motivo_contato}}</option>
    @endforeach
    @if($errors->has('motivo_contatos_id'))
        {{$errors->first('motivo_contatos_id')}}
    @endif
</select>
<br>
<textarea name="mensagem" value="{{old('mensagem')}}"class="borda-preta">Preencha aqui a sua mensagem</textarea>
    @if($errors->has('mensagem'))
        {{$errors->first('mensagem')}}
    @endif
<br>
<button type="submit" class="borda-preta">ENVIAR</button>
</form>
@if($errors->any())
    <div style="">
        @foreach($errors->all() as $erro)
            {{$erro}}
        @endforeach
    </div>
@endif

