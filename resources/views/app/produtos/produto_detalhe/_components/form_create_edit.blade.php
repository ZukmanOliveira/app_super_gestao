
@if(isset($produto_detalhe->id))
    <form method="post" action="{{route('produto-detalhes.update',['produto_detalhe'=>$produto_detalhe->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action={{route("produto-detalhes.store",['unidades'=> $unidades])}}>
    @csrf
@endif

        <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id')}}" placeholder="Codigo Do Produto"  class="borda-preta">
            {{ $errors->has('produto_id') ? $errors->first('produto_id'):'' }}

        <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento')}}" placeholder="comprimento"  class="borda-preta">
            {{ $errors->has('comprimento') ? $errors->first('comprimento'):'' }}
        
        <input type="text" name="largura"  value="{{$produto_detalhe->largura ?? old('largura')}}" placeholder="Largura"  class="borda-preta">
            {{ $errors->has('largura') ? $errors->first('largura'):'' }}

        <input type="text" name="altura" value="{{$produto_detalhe->altura ?? old('altura')}}"  placeholder="altura"    class="borda-preta"> 
            {{ $errors->has('altura') ? $errors->first('altura'):'' }}

        <select name="unidade_id" >
            <option>--- Selecione  a  Unidade de Medida</option>

            @foreach ($unidades as $unidade)
                <option value="{{$unidade->id}}" {{$produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}} {{$unidade->largura}}>Unidade</option>
            @endforeach
        </select>

        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

        <button type="submit" class="borda-preta">Concluir Alteração</button>
        
    </form>    
