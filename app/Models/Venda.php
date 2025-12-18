<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    protected $fillable = [
        'user_id',
        'valor_subtotal',
        'desconto',
        'valor_total',
        'forma_pagamento',
        'info_pagamento',
        'observacoes'
    ];

    protected $casts = [
        'info_pagamento' => 'array'
    ];

    public function itens()
    {
        return $this->hasMany(VendaItem::class, 'venda_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
