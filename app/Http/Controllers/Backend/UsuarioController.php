<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsuarioDataTable;
use App\Http\Controllers\Controller;
use App\Traits\UploadImagensTrait;
use Flasher\Laravel\Facade\Flasher;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    use UploadImagensTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(UsuarioDataTable $dataTable)
    {
        return $dataTable->render('admin.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $request->validate([
            'nome' => ['required', 'max:100'],
            'sobrenome' => ['required', 'max:255'],
            'nivel' => ['required'],
            'email' => ['required', 'max:255', 'unique:users,email,'],
        ]);


        $usuario = new Usuario();

        $capaUsuario = $this->enviaImagemUnica($request, 'capa', 'usuario');

        $usuario->capa = $capaUsuario;
        $usuario->nome = $request->nome;
        $usuario->sobrenome = $request->sobrenome;
        $usuario->fone = $request->fone;
        $usuario->nivel = $request->nivel;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);

        $usuario->save();

        Flasher::addSuccess('Atualizado com sucesso!');

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::find($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => ['required', 'max:100'],
            'sobrenome' => ['required', 'max:255'],
            'nivel' => ['required'],
            'email' => ['required', 'unique:users,email,' . $id, 'max:255'],
        ]);


        $usuario = Usuario::find($id);

        $capaUsuario = $this->atualizaImagemUnica($request, 'capa', 'usuario', $usuario->capa);

        $usuario->capa = empty(!$capaUsuario) ? $capaUsuario : $usuario->capa;
        $usuario->nome = $request->nome;
        $usuario->sobrenome = $request->sobrenome;
        $usuario->fone = $request->fone;
        $usuario->nivel = $request->nivel;
        $usuario->email = $request->email;

        if(isset($request->password)){
            $usuario->password = bcrypt($request->password);
        }else{
            unset($request->password);
        };

        $usuario->save();

        Flasher::addSuccess('Atualizado com sucesso!');

        return redirect()->route('usuarios.index');
    }

    /**
     * Mudar Status
     */
    public function mudaStatus(Request $request)
    {
        $usuario = Usuario::find($request->id);
        $usuario->status = $request->status == 'true' ? 'ativo' : 'cancelado';
        $usuario->save();

        return response(['message' => 'Status Atualizao']);
    }

    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);
        $this->deletaImagem($usuario->capa);
        $usuario->delete();

        return response (['status' => 'success', 'message' => 'Excluído com Sucesso!']);
    }
}
