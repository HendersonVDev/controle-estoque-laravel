@extends('admin.layouts.master')
@section('content')

<div class="container mt-4">
    <h3>Nova Categoria de Estoque</h3>
    <form action="{{ route('categorias-estoque.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
            @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('categorias-estoque.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

@endsection
