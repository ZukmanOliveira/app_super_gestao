
<form method="post" action="{{ route('pedido-produto.store', ['pedido'=>$pedido, 'produtos'=>$produtos]) }}">

@csrf

    <select name="produtos_id" >
        <option>--- Selecione a produto</option>

        @foreach ($produtos as $produto)
            <option value="{{$produto->id}}" {{ old('produtos_id') == $produto->id ? 'selected' : ''}} >{{$produto->nome}}</option>
        @endforeach

    </select>
    {{$errors->has('produtos_id') ? $errors->first('produtos_id') : ''}}

    <input type="number"  name="quantidade" value="{{ old('quantidade') ? old('quatidade') : '' }}" placeholder="Quantidade" class="border-preta">
    {{$errors->has('quantidade') ? $errors->first('quantidade') : ''}}

    <button type="submit" class="borda-preta">Concluir</button> 
</form>    
