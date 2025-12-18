<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Usuario;


class AdminController extends Controller
{
//Dashboard do Admin
    public function dashboard(){
        $totalUsuarios = Usuario::where('nivel', 'admin')->count();
        return view('admin.dashboard', compact(
            'totalUsuarios',


        ));
    }

//Fazer Login
    public function login(){
        return view('admin.auth.login');
    }

//Recuperar a senha
    public function recuperarSenha(){
        return view('admin.auth.forgot-password');
    }
}
