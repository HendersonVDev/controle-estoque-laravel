@extends('admin.layouts.master')
@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Editar Produto</h3>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input
                type="text"
                name="nome"
                id="nome"
                value="{{ old('nome', $produto->nome) }}"
                class="form-control"
                required
            >
        </div>

        {{-- ALTERADO: select de categorias com selected automático --}}
        <div class="mb-3">
            <label for="categoria_estoque_id" class="form-label">Categoria</label>
            <select name="categoria_estoque_id" id="categoria_estoque_id" class="form-select" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option
                        value="{{ $categoria->id }}"
                        {{ $produto->categoria_estoque_id == $categoria->id ? 'selected' : '' }}
                    >
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input
                type="number"
                name="quantidade"
                id="quantidade"
                value="{{ old('quantidade', $produto->quantidade) }}"
                class="form-control"
                min="0"
                required
            >
        </div>

        <div class="mb-3">
            <label for="preco_venda" class="form-label">Preço de Venda</label>
            <input
                type="text"
                name="preco_venda"
                id="preco_venda"
                value="{{ old('preco_venda', $produto->preco_venda) }}"
                class="form-control"
            >
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

@endsection
