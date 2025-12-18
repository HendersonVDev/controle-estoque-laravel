<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //Dashboard Cliente
    public function dashboard(){
        return view('cliente.dashboard');
    }
}
