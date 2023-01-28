<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProdutos extends Model
{
    use HasFactory;
    protected $table = 'pedidos_produtos';

    protected $fillable = ['_token', 'pedidos_id','produtos_id'];
}