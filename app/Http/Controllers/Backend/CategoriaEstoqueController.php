<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategoriaEstoque;
use Illuminate\Http\Request;

class CategoriaEstoqueController extends Controller
{
    public function index()
    {
        $categorias = CategoriaEstoque::orderBy('nome')->paginate(10);
        return view('admin.categorias_estoque.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias_estoque.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias_estoque,nome',
            'descricao' => 'nullable|string',
        ]);

        CategoriaEstoque::create($request->all());
        return redirect()->route('categorias-estoque.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit(CategoriaEstoque $categorias_estoque)
    {
        return view('admin.categorias_estoque.edit', compact('categorias_estoque'));
    }

    public function update(Request $request, CategoriaEstoque $categorias_estoque)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias_estoque,nome,' . $categorias_estoque->id,
            'descricao' => 'nullable|string',
        ]);

        $categorias_estoque->update($request->all());
        return redirect()->route('categorias-estoque.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(CategoriaEstoque $categorias_estoque)
    {
        $categorias_estoque->delete();
        return redirect()->route('categorias-estoque.index')->with('success', 'Categoria removida!');
    }
}
