@extends('admin.layouts.master')

@section('content')
<style>
    .pdv-container{
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
    }

    .pdv-box{
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.06);
    }

    table{
        width: 100%;
        font-size: 14px;
    }

    thead{
        font-weight: bold;
        background: #e9ecef;
    }

    input[type="text"], input[type="number"] {
        width: 100%;
    }

    .total-display{
        font-size: 28px;
        font-weight: bold;
        color: #0d6efd;
    }

    .btn-finalizar{
        width: 100%;
        font-size: 20px;
        padding: 15px;
    }
</style>

<div class="pdv-container">

    {{-- Coluna Esquerda - Produtos --}}
    <div class="pdv-box">
        <h3>PDV - Sistema de Vendas</h3>
        <hr>

        {{-- Campo de busca por ID --}}
        <div class="mb-3">
            <label class="form-label">Digite o ID do produto:</label>
            <input type="number" id="campo_id" class="form-control" placeholder="Ex: 2" autofocus>
        </div>

        {{-- Lista de itens --}}
        <table class="table table-bordered" id="tabela_itens">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Produto</td>
                    <td>Qtd</td>
                    <td>Valor</td>
                    <td>Subtotal</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    {{-- Coluna Direita - Pagamento --}}
    <div class="pdv-box">
        <h4>Resumo</h4>
        <hr>

        <p>Subtotal: <span id="subtotal_texto">R$ 0,00</span></p>
        <p>Desconto:</p>

        <input type="number" id="desconto" class="form-control mb-2" placeholder="Ex: 5.00">

        <p>Total:</p>
        <div class="total-display" id="total_texto">R$ 0,00</div>

        <label class="mt-3">Forma de pagamento:</label>
        <select id="forma_pagamento" class="form-control">
            <option value="dinheiro">Dinheiro</option>
            <option value="pix">PIX</option>
            <option value="cartao_credito">Cartão Crédito</option>
            <option value="cartao_debito">Cartão Débito</option>
        </select>

        <button class="btn btn-success btn-finalizar mt-4" onclick="finalizarVenda()">Finalizar Venda</button>
    </div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('js/pdv.js') }}"></script>
@endsection

