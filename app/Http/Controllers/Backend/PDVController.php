<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Models\HistoricoEstoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PDVController extends Controller
{
    public function index()
    {
        return view('pdv.index');
    }

    /**
     * API para retornar produto pelo ID
     */
// ...

public function buscarProduto($id)
{
    Log::info("PDV buscarProduto chamada com id: {$id}");

    if (!is_numeric($id)) {
        Log::warning("PDV buscarProduto id não numérico: " . $id);
    }

    $produto = Produto::find($id);

    if (!$produto) {
        Log::info("PDV produto não encontrado id: {$id}");
        return response()->json([
            "status" => false,
            "mensagem" => "Produto não encontrado",
            "debug" => [
                "id_recebido" => $id,
                "exists_in_db" => (bool)Produto::where('id', $id)->exists()
            ]
        ], 404);
    }

    Log::info("PDV produto encontrado", ['produto_id' => $produto->id, 'preco_venda' => $produto->preco_venda]);

    return response()->json([
        "status" => true,
        "produto" => [
            "id" => $produto->id,
            "nome" => $produto->nome,
            "preco_venda" => (string) $produto->preco_venda // string ok, JS normaliza
        ]
    ]);
}

    /**
     * Finaliza a venda
     */
    public function finalizarVenda(Request $request)
    {
        $data = $request->all();

        $venda = Venda::create([
            'user_id'        => Auth::id(),
            'valor_subtotal' => $data['subtotal'],
            'desconto'       => $data['desconto'],
            'valor_total'    => $data['total'],
            'forma_pagamento' => $data['forma_pagamento'],
            'info_pagamento' => $data['pagamento_extra'] ?? null,
            'observacoes'   => $data['observacoes'] ?? null
        ]);

        foreach ($data['itens'] as $item) {

            VendaItem::create([
                'venda_id'      => $venda->id,
                'produto_id'    => $item['id'],
                'quantidade'    => $item['qtd'],
                'preco_unitario'=> $item['preco'],
                'subtotal'      => $item['preco'] * $item['qtd']
            ]);

            HistoricoEstoque::create([
                'produto_id' => $item['id'],
                'quantidade_movimentada' => $item['qtd'],
                'tipo' => 'saida',
                'motivo' => 'Venda PDV',
                'referencia_id' => $venda->id
            ]);

            Produto::where('id', $item['id'])
                ->decrement('quantidade', $item['qtd']);
        }

        return response()->json([
            'status' => true,
            'mensagem' => 'Venda finalizada com sucesso!',
            'venda_id' => $venda->id
        ]);
    }
}
