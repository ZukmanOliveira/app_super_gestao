<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;

    protected $table = 'produto_detalhes';
    
    protected $fillable = ['produto_id','comprimento','largura','altura','unidade_id'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'produto_id', 'id' );
    }
}
