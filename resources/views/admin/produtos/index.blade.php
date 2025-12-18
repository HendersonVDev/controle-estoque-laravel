@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Controle de Estoque</h4>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Novo Produto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Unidade</th>
                    <th>Estoque Mínimo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produtos as $produto)
                    <tr class="{{ $produto->quantidade <= $produto->estoque_minimo ? 'table-danger' : '' }}">
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>

                        {{-- Categoria (relacionamento) --}}
                        <td>{{ $produto->categoriaEstoque?->nome ?? '—' }}</td>

                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ $produto->unidade }}</td>
                        <td>{{ $produto->estoque_minimo }}</td>

                        <td>
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Remover este produto?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">Nenhum produto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $produtos->onEachSide(1)->links() }}
    </div>

</div>

@endsection
