@extends('admin.layouts.master')
@section('content')

<div class="container-fluid mt-4">

    {{-- Cabeçalho com botão --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Categorias de Estoque</h2>
        <a href="{{ route('categorias-estoque.create') }}" class="btn btn-success px-4 py-2">
            <i class="fas fa-plus me-1"></i> Nova Categoria
        </a>
    </div>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabela responsiva --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th style="width: 10%">#</th>
                            <th style="width: 70%">Nome</th>
                            <th style="width: 20%" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categorias as $categoria)
                            <tr>
                                <td class="fw-semibold">{{ $categoria->id }}</td>
                                <td>{{ $categoria->nome }}</td>
                                <td class="text-center">
                                    <a href="{{ route('categorias-estoque.edit', $categoria->id) }}"
                                       class="btn btn-sm btn-warning me-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('categorias-estoque.destroy', $categoria->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                            <i class="fas fa-trash-alt"></i> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">
                                    Nenhuma categoria cadastrada.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Paginação --}}
        <div class="card-footer bg-light">
            <div class="d-flex justify-content-center">
                {{ $categorias->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
