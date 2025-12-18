<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dados;
use App\Traits\UploadImagensTrait;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class DadosController extends Controller
{

    use UploadImagensTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Dados::first();
        return view('admin.dados.index', compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'logo' => ['image', 'max:3000'],
            'icone' => ['image', 'max:3000'],
            'nome' => ['required', 'max:255'],
            'cnpj' => ['required', 'max:255'],
            'whatsapp' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'descricao' => ['required'],
        ]);

        $dados = Dados::find(39291);

        $logoSite = null;
        $icone = null;

        if($request->hasFile('logo')){
            //se não existir faz o upload
              $logoSite = $this->atualizaImagemUnica($request, 'logo', 'empresa', $dados->logo);
        }else{
            // se existir matém
            $logoSite = $dados->logo;
        }

        if($request->hasFile('icone')){
            //se não existir faz o upload
              $icone  = $this->atualizaImagemUnica($request, 'icone', 'empresa', $dados->icone);
        }else{
            // se existir matém
            $icone  = $dados->icone;
        }

        $dados->logo = $logoSite;
        $dados->icone = $icone;
        $dados->nome = $request->nome;
        $dados->cnpj = $request->cnpj;
        $dados->whatsapp = $request->whatsapp;
        $dados->email = $request->email;
        $dados->descricao = $request->descricao;
        $dados->fone = $request->fone;
        $dados->endereco = $request->endereco;
        $dados->numero = $request->numero;
        $dados->cep = $request->cep;
        $dados->cidade = $request->cidade;
        $dados->estado = $request->estado;
        $dados->save();

        Flasher::addSuccess('Atualizado com sucesso!');

        return redirect()->back();

    }

}
