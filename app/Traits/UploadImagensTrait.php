<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait UploadImagensTrait
{
   //enviar uma imagm única
   public function enviaImagemUnica(Request $request, $nomeDoCampo, $pasta)
   {

     if($request->hasFile($nomeDoCampo)){

        $imagem = $request->{$nomeDoCampo};
        $ext = $imagem->getClientOriginalExtension();
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        $urlDaImagem = 'media_' . uniqid() . '-msflix-' . $dia . '-' . $mes . '-' . $ano . '-.'.$ext;
        $imagem->move(public_path($pasta), $urlDaImagem);

        //caminho da pasta de imagens
        return $pasta . '/' . $urlDaImagem;

     }

   }

   //atualiza imagem única
   public function atualizaImagemUnica(Request $request, $nomeDoCampo, $pasta, $outraImg = null)
   {

     if($request->hasFile($nomeDoCampo)){

        //verifica se existe a imagem na pasta publica
        if(File::exists(public_path($outraImg))){
            File::delete(public_path($outraImg));
        }

        $imagem = $request->{$nomeDoCampo};
        $ext = $imagem->getClientOriginalExtension();
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        $urlDaImagem = 'media_' . uniqid() . '-msflix-' . $dia . '-' . $mes . '-' . $ano . '-.'.$ext;
        $imagem->move(public_path($pasta), $urlDaImagem);

        //caminho da pasta de imagens
        return $pasta . '/' . $urlDaImagem;

     }

   }

   //enviar galeria de fotos
   public function enviaGaleria(Request $request, $nomeDoCampo, $pasta)
   {

    $imagensGaleria = [];

     if($request->hasFile($nomeDoCampo)){

        $imagens = $request->{$nomeDoCampo};

        foreach($imagens as $imagem){
        $ext = $imagem->getClientOriginalExtension();
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        $urlDaImagem = 'media_' . uniqid() . '-HVDev-' . $dia . '-' . $mes . '-' . $ano . '-.'.$ext;
        $imagem->move(public_path($pasta), $urlDaImagem);

        //caminho da pasta de imagens
            $imagensGaleria[] = $pasta . '/' . $urlDaImagem;
        }
        
        return $imagensGaleria;
     }

   }

   //deleta imagem
   public function deletaImagem(string $imagem){
      //verifica se existe a imagem na pasta publica
      if(File::exists(public_path($imagem))){
        File::delete(public_path($imagem));
      }
   }


}
