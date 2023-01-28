<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['clientes_id'];

    public function produtos(){
        return $this->belongsToMany(Item::class ,'pedidos_produtos','pedidos_id','produtos_id');
    }
}
