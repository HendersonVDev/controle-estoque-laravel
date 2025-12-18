@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <h4 class="mb-3">Novo Produto</h4>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            {{-- ALTERADO: campo de categoria agora é um select dinâmico --}}
            <div class="col-md-3">
                <label class="form-label">Categoria</label>
                <select name="categoria_estoque_id" class="form-select" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Unidade</label>
                <select name="unidade" class="form-select">
                    <option>un</option>
                    <option>kg</option>
                    <option>L</option>
                    <option>cx</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Quantidade</label>
                <input type="number" name="quantidade" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Estoque Mínimo</label>
                <input type="number" name="estoque_minimo" class="form-control" value="5">
            </div>

            <div class="col-md-3">
                <label class="form-label">Preço de Custo</label>
                <input type="number" step="0.01" name="preco_custo" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Preço de Venda</label>
                <input type="number" step="0.01" name="preco_venda" class="form-control">
            </div>

            <div class="col-12">
                <button class="btn btn-success mt-3">Salvar Produto</button>
                <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
            </div>
        </div>
    </form>
</div>

@endsection
