<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\CategoriaEstoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    /**
     * 🔹 LISTAR PRODUTOS
     */
    public function index()
    {
        // Carrega produtos com o nome da categoria (relacionamento)
        $produtos = Produto::with('categoriaEstoque')->paginate(10);

        return view('admin.produtos.index', compact('produtos'));
    }

    /**
     * 🔹 FORMULÁRIO DE CRIAÇÃO
     */
    public function create()
    {
        // Busca todas as categorias disponíveis
        $categorias = CategoriaEstoque::orderBy('nome')->get();

        return view('admin.produtos.create', compact('categorias'));
    }

    /**
     * 🔹 SALVAR NOVO PRODUTO
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'estoque_minimo' => 'nullable|integer|min:0',
            'unidade' => 'nullable|string|max:10',
            'preco_custo' => 'nullable|numeric|min:0',
            'preco_venda' => 'nullable|numeric|min:0',
            'categoria_estoque_id' => 'nullable|exists:categorias_estoque,id',
        ]);

        Produto::create($validated);

        return redirect()
            ->route('produtos.index')
            ->with('success', '✅ Produto cadastrado com sucesso!');
    }

    /**
     * 🔹 FORMULÁRIO DE EDIÇÃO
     */
    public function edit(Produto $produto)
    {
        // Carrega todas as categorias
        $categorias = CategoriaEstoque::orderBy('nome')->get();

        // Retorna a view de edição com o produto e as categorias
        return view('admin.produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * 🔹 ATUALIZAR PRODUTO
     */
    public function update(Request $request, Produto $produto)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'estoque_minimo' => 'nullable|integer|min:0',
            'unidade' => 'nullable|string|max:10',
            'preco_custo' => 'nullable|numeric|min:0',
            'preco_venda' => 'nullable|numeric|min:0',
            'categoria_estoque_id' => 'nullable|exists:categorias_estoque,id',
        ]);

        $produto->update($validated);

        return redirect()
            ->route('produtos.index')
            ->with('success', '✅ Produto atualizado com sucesso!');
    }

    /**
     * 🔹 EXCLUIR PRODUTO
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()
            ->route('produtos.index')
            ->with('success', '🗑️ Produto removido com sucesso!');
    }
}
