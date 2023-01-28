
@if(isset($pedido->id))
    <form method="post" action="{{route('pedido.update',['pedido' => $pedido->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action={{route("pedido.store")}}>
    @csrf
@endif
        <select name="clientes_id" >
            <option>--- Selecione a Pedido</option>

            @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}" {{$pedido->clientes_id ?? old('clientes_id') == $cliente->id ? 'selected' : ''}} >{{$cliente->nome}}   </option>
            @endforeach
        </select>
       
        <button type="submit" class="borda-preta">Concluir</button> 
    </form>    
