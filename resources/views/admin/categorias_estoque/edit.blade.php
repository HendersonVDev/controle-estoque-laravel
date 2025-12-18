@extends('admin.layouts.master')
@section('content')

<div class="container mt-4">
    <h3>Editar Categoria de Estoque</h3>
    <form action="{{ route('categorias-estoque.update', $categorias_estoque->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $categorias_estoque->nome) }}" required>
            @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('categorias-estoque.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

@endsection
