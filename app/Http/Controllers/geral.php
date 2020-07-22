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
    public function apresentarListaCompras()
    {
        //devolve a lista completa de todas compras registradas
        $compras = compras::all();
        return $compras;
    }

    //================================================
    public function apresentarCliente($id)
    {
        //devolve os dados de um cliente específico com (id = x)
        $cliente = clientes::find($id);
        return $cliente;
    }

    //================================================
    public function apresentarCompra($id)
    {
        //devolve os dados de um cliente específico com (id = x)
        $compra = compras::find($id);
        return $compra;
    }

    //================================================
    public function pesquisarCliente($pesquisa)
    {
        //procurar os dados do(s) cliente(s) que contenham o termo $pesquisa no nome
        $clientes = clientes::where('nome', 'like', '%'.$pesquisa.'%')->get();
        return $clientes;
    }
}
