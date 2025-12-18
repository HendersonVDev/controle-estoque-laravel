<?php

namespace App\Http\Controllers\Backend;
use App\Traits\UploadImagensTrait;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class PerfilController extends Controller
{
    use UploadImagensTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perfil.index');
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
        'nome' =>['required', 'max:100'],
        'sobrenome' =>['required', 'max:255'],
        'email' =>['required', 'max:255', 'unique:users,email,' . $id],
        ]);

        $usuario = User::find($id);

        $capaUsuario = $this->atualizaImagemUnica($request, 'capa', 'usuario', $usuario->capa);

        $usuario->capa = empty(!$capaUsuario) ? $capaUsuario : $usuario->capa;
        $usuario->nome = $request->nome;
        $usuario->sobrenome = $request->sobrenome;
        $usuario->fone = $request->fone;
        $usuario->nivel = 'admin';
        $usuario->email = $request->email;

        if(isset($request->password)){
            $usuario->password = bcrypt($request->password);
        }else{
            unset($request->password);
        };

        $usuario->save();

        Flasher::addSuccess('Atualizado com sucesso!');

        return redirect()->back();

    }

}
