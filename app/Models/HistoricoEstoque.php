<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoEstoque extends Model
{
    protected $table = 'historico_estoque';

    protected $fillable = [
        'produto_id',
        'quantidade_movimentada',
        'tipo',
        'motivo',
        'referencia_id'
    ];
}
