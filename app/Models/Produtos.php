<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdutoDetalhe;
use Illuminate\Support\Facades\App;

class Produtos extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome','peso','descricao','unidade_id'];

    public function produtoDetalhe()
    {
        return $this->hasOne(ProdutoDetalhe::class, 'produtos_id');
    }

}
