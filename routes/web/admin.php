<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoriaController;
use App\Http\Controllers\Backend\CategoriaEstoqueController;
use App\Http\Controllers\Backend\DadosController;
use App\Http\Controllers\Backend\EstoqueController;
use App\Http\Controllers\Backend\PerfilController;
use App\Http\Controllers\Backend\UsuarioController;
use App\Http\Controllers\Backend\PDVController;
use Illuminate\Support\Facades\Route;

//Grupo de Rotas Painel de Controle ADMIN
//Criado dia 25.09.2025 por Henderson Vieira Jorgetti
//Versão 1.0.0 Versão Laravel 12
Route::middleware('auth', 'admin' )->group(function () {

//rota do painel admin universal
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->name('admin.dashboard');

/************************************
* INICIO CONFIGURAÇÕES
* Acessar as configurações do site
************************************* */

//Rota do painel
Route::get('admin/dados/index', [DadosController::class, 'index'])
->name('dados.index');

//Atualiza as configurações do site
Route::put('admin/dados/update', [DadosController::class, 'update'])
->name('dados.update');

//Categorias
Route::resource('admin/categorias', CategoriaController::class);

//PDV - Ponto de Venda
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/pdv', [PDVController::class, 'index'])->name('pdv.index');
    Route::get('/pdv/produto/{id}', [PDVController::class, 'buscarProduto'])->name('pdv.buscar-produto');
    Route::post('/pdv/finalizar', [PDVController::class, 'finalizarVenda'])->name('pdv.finalizar');

});

//Produtos
Route::resource('admin/produtos', EstoqueController::class);

//Categorias Produtos
Route::resource('admin/categorias-estoque', CategoriaEstoqueController::class);

//Perfil do usuário logado
Route::get('admin/perfil/index', [PerfilController::class, 'index'])
->name('admin.perfil.ms.index');
//Atualizar os dados do usuário logado
Route::put('admin/perfil/update/{id}', [PerfilController::class, 'update'])
->name('admin.perfil.ms.update');

//Muda Status de Usuarios
Route::put('admin/usuarios/muda-status', [UsuarioController::class, 'mudaStatus'])
->name('usuarios.muda-status');
//Usuarios do Site
Route::resource('admin/usuarios', UsuarioController::class);

});

