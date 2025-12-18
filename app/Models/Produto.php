<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'quantidade',
        'estoque_minimo',
        'unidade',
        'preco_custo',
        'preco_venda',
        'categoria_estoque_id', // importante incluir aqui também
    ];

    public function categoriaEstoque()
    {
        return $this->belongsTo(CategoriaEstoque::class, 'categoria_estoque_id');
    }
}
