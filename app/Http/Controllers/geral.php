<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientes;
use App\compras;

class geral extends Controller
{
    //================================================
    public function index()
    {
        return 'Bem-vindo!';
    }

    //================================================
    public function apresentarListaCliente()
    {
        //retorna todos clientes registrados na base de dados
        $clientes = clientes::all();
        return $clientes;
    }

    //================================================
}
