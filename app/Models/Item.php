<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = ['nome','peso','descricao','unidade_id'];

    public function ItemDetalhe()
    {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos','produtos_id','pedidos_id');
    }
    
}
