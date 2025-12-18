<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rotas organizadas da pasta web

foreach (File::allfiles(__DIR__.'/web') as $rotaArquivo){
    require $rotaArquivo->getPathname();
}

//rota do painel admin
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

//Rota para recuperar a senha
Route::get('admin/recuperar-senha', [AdminController::class, 'recuperarSenha'])->name('admin.recuperar.senha');

require __DIR__.'/auth.php';
