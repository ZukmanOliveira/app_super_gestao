@if(isset($cliente->id))
    <form method="post" action="{{route('cliente.update',['cliente'=>$cliente->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action={{route("cliente.store")}}>
    @csrf
@endif
<select name="cliente_id" >
    <option>--- Selecione a Pedido</option>

    @foreach ($clientes as $cliente)
        <option value="{{$cliente->id}}"
                    {{/*Para saber qual campo está selecionado **/}}
                    {{$pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected' : ''}}
                    {{$cliente->nome}}>Cliente</option>
    @endforeach
</select>
    {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}

        <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome')}}" placeholder="Nome"  class="borda-preta">
            {{ $errors->has('cliente_id') ? $errors->first('cliente_id'):'' }}

        <button type="submit" class="borda-preta">Concluir Alteração</button>
        
    </form>    
