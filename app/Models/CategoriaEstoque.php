<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaEstoque extends Model
{
    use HasFactory;

    protected $table = 'categorias_estoque';

    protected $fillable = [
        'nome',
    ];

    // Relacionamento com produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'categoria_estoque_id');
    }
}
